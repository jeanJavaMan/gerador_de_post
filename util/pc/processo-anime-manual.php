<?php

require_once '../simple_html_dom.php';
require_once '../sessoes.php';
require_once 'Funcoes.php';
require_once '../ftptransfer.php';
require_once '../../class/Banco.php';
require_once 'PostCode.php';
require_once '../../vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;

$linksDown = explode("|", $_POST["linksDown"]);
$serverNames = explode("|", $_POST["servers"]);
$linkAnimeList = $_POST["linkAnimeList"];
$linkAnimakai = $_POST["linkAnima"];
$epStart = $_POST["epStart"];
try {
    $codeAnimeList = file_get_html($linkAnimeList);
    $codeAnimakai = file_get_html($linkAnimakai);
    $tr = new TranslateClient("en", "pt-br");
    $banco = new Banco();
    $titulo = Funcoes::pegaTituloAnimeList($codeAnimeList);

    $tituloSemCaracter = Funcoes::removerCaracteres($titulo);
    $tituloParaImagem = str_replace(" ", "-", $tituloSemCaracter);
    $linksProtetor = array();
    foreach ($linksDown as $linksdwn) {
        $arrayLinks = Funcoes::separarLinks($linksdwn);
        $banco->addLinks($arrayLinks);
        $linksProtetor[] = $banco->getListProtetor(count($arrayLinks));
    }

    $nomesEpisodio = Funcoes::pegaNomeEpisodioDe($codeAnimeList, $epStart, count($linksProtetor[0]), $tr);
    $imagensAnimakai = Funcoes::pegaImagensAnima($codeAnimakai, $epStart, count($linksProtetor[0]));
    $nomeImagens = array();
    for ($i = 0; $i < sizeof($imagensAnimakai); $i ++) {
        $linkImagem = $imagensAnimakai[$i];
        if (!Funcoes::verificarExtensao($linkImagem)) {
            
            if (copy($linkImagem, "../../img/" . $tituloParaImagem . $i . date("d-m-y") .
                            ".png")) {
                $nomeImagens[] = $tituloParaImagem . $i . date("d-m-y");
            }else{
                $nomeImagens[] = "";
            }
        } else {
            $nomeImagens[] = "";
        }
    }
    enviarImagensFTP($nomeImagens);
    $banco->closeConexao();
    $postCode = new PostCode();
    $codigo = $postCode->getDownAnimesManual($serverNames, $nomeImagens, $linksProtetor, $nomesEpisodio, $epStart);

    addCodigo($codigo);
    addTags("");
    addMetaDesc("");
    addTitulo("");
    addDesc("");
    addQuantImagens("x?");
    header("location: ../../home.php?key=final");
} catch (Exception $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=pc");
    die();
}

function enviarImagensFTP($imagemNomes) {
    // começa a conexao com o ftp
    $serverHost = '158.69.208.186';
    $serverUser = 'webmaster';
    $serverPass = 'riWejen6';
    $diretorioRemotoImg = "wp-content/uploads/2016/img";
    // estabelece a conexão
    $conn_id = ftp_connect($serverHost);

    // login com o nome de usuário e senha
    $login_result = ftp_login($conn_id, $serverUser, $serverPass);

    // confere a conexão
    if ((!$conn_id) || (!$login_result)) {
        addDanger("Não foi possivel se conectar com o servidor FTP");
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    }
    // tenta mudar para algumDiretorio
    if (!ftp_chdir($conn_id, $diretorioRemotoImg)) {
        addDanger(
                "Não foi possivel mudar o diretorio<br> ImagemDiretorio Atual: " .
                ftp_pwd($conn_id));
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    }

    transferirFtpImg($conn_id, $imagemNomes);
    ftp_close($conn_id);
}
