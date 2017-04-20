<?php

require_once '../simple_html_dom.php';
require_once '../sessoes.php';
require_once 'Funcoes.php';
require_once '../ftptransfer.php';
require_once '../../class/Banco.php';
require_once 'PostCode.php';
require_once '../../vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;

ini_set("max_execution_time", 0);

$linkAnbient = $_POST["linkAnbient"];
$linksAnima = $_POST["linkAnima"];
$quantAnima = $_POST["quantAnima"];
$linksDown = explode("|", $_POST["linksDown"]);
$serverNames = explode("|", $_POST["servers"]);
$serversNameCodi = explode("|", $_POST["serversCodi"]);
$linksCodi = explode("|", $_POST["linksCodi"]);
$linkAnimeList = $_POST["linkAnimeList"];
$quantList = $_POST["quantList"];
$linkImg1 = $_POST["linkimg1"];
$linkImg2 = $_POST["linkimg2"];
$linkImg3 = $_POST["linkimg3"];
$linkYoutube = $_POST["linkyoutube"];

$codeAnbient = file_get_html($linkAnbient);
$tr = new TranslateClient("en", "pt-br");
try {
    $banco = new Banco();

    $titulo = Funcoes::pegarTitulo($codeAnbient);
    $tituloSemCaracteres = Funcoes::removerCaracteres($titulo);
    $imagemCapaLink = Funcoes::pegarImagemCapa($codeAnbient);
    $descricao = Funcoes::pegarDescricaoAnime($codeAnbient);
    $imagensLinkAnima = Funcoes::pegarLinkImagem($linksAnima, $quantAnima);
    $introducao = Funcoes::pegaIntroducaoList($linkAnimeList);
    $informacoes = Funcoes::pegaInformacoesList($linkAnimeList, $tr);
    $episodiosNome = Funcoes::pegaNomeEpisodios($linkAnimeList, $tr, $quantList);
    $links_codi_pronto = Funcoes::decodificaLinks($linksCodi);

    $tituloParaImagem = str_replace(" ", "-", $tituloSemCaracteres);
    $screenImagemNome = array();
    $screenImagemNome[] = $tituloParaImagem . "0";
    copy($imagemCapaLink, "../../img/" . $tituloParaImagem . "0.png");
    $screenImagemNome[] = $tituloParaImagem . "1";
    copy($linkImg1, "../../img/" . $tituloParaImagem . "1.png");
    $screenImagemNome[] = $tituloParaImagem . "2";
    copy($linkImg2, "../../img/" . $tituloParaImagem . "2.png");
    $screenImagemNome[] = $tituloParaImagem . "3";
    copy($linkImg3, "../../img/" . $tituloParaImagem . "3.png");
    $contador = 3;
    $imagemNomes = array();
    for ($i = 0; $i < count($imagensLinkAnima); $i++) {
        $linkImagem = $imagensLinkAnima[$i];
        if (!Funcoes::verificarExtensao($linkImagem)) {
            $contador++;
            if (copy($linkImagem, "../../img/" . $tituloParaImagem . $contador . ".png")) {
                $imagemNomes[] = $tituloParaImagem . $contador;
            } else {
                $imagemNomes[] = "";
            }
        } else {
            $imagemNomes[] = "";
        }
    }
    enviarImagensFTP($imagemNomes, $screenImagemNome);
    $linksProtetor = [];
    $linksProtetorCodi = [];
    if (count($linksDown) != 0) {
        foreach ($linksDown as $links_dwn) {
            $links_dwn = Funcoes::separarLinks($links_dwn);
            $banco->addLinks($links_dwn);
            $linksProtetor[] = $banco->getListProtetor(count($links_dwn));
        }
    }
    if (count($links_codi_pronto) != 0) {
        foreach ($links_codi_pronto as $links_codi) {
            $banco->addLinks($links_codi);
            $linksProtetorCodi[] = $banco->getListProtetor(count($links_codi));
        }
    }
    $banco->closeConexao();
    $postCode = new PostCode();
    $codigo = "";
    $codigo .= $postCode->getIntroducaoAnime($introducao);
    $codigo .= $postCode->getCapaAnime($screenImagemNome[0], $informacoes);
    $codigo .= $postCode->getSinopse($descricao);
    $codigo .= $postCode->getScreens($screenImagemNome[1], $screenImagemNome[2], $screenImagemNome[3]);
    $codigo .= $postCode->getYoutube($linkYoutube);
    $codigo .= $postCode->getDownAnimesCodi($titulo, $serverNames, $serversNameCodi, $imagemNomes, $linksProtetor, $linksProtetorCodi, $episodiosNome);

    addCodigo($codigo);
    addTags($postCode->getTagsAnimes($titulo));
    addMetaDesc($postCode->getMetaAnime($titulo));
    addTitulo($postCode->getTituloAnime($titulo));
    addDesc(strtolower($tituloSemCaracteres));
    addQuantImagens("x?");
    header("location: ../../home.php?key=final");
} catch (Exception $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=pc");
    die();
}

function enviarImagensFTP($imagemNomes, $screenImagensNome) {
    //começa a conexao com o ftp
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
        addDanger("Não foi possivel mudar o diretorio<br> ImagemDiretorio Atual: " . ftp_pwd($conn_id));
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    }
    transferirFtpImg($conn_id, $screenImagensNome);
    transferirFtpImg($conn_id, $imagemNomes);
    ftp_close($conn_id);
}
