<?php

require_once("../../util/android/Funcoes.php");
require_once("../../vendor/autoload.php");
require_once("../../util/android/CodeSite.php");
require_once("../../util/sessoes.php");
//require_once("../../util/upProtetor.php");
require_once("../../util/simple_html_dom.php");
require_once("../ftptransfer.php");
require_once '../../class/Banco.php';

use Stichoza\GoogleTranslate\TranslateClient;

\Tinify\setKey("flFd66ezLMJZbTsZwCexF5b_j8-ow6_y");

$linkDoSite = $_POST["linkSite"];
$link_fars = $_POST["linkfars"];
$linkImgCapa = $_POST["linkImgCapa"];
$linkImg1 = $_POST["linkImg1"];
$linkImg2 = $_POST["linkImg2"];
$linkImg3 = $_POST["linkImg3"];
$linkImg4 = $_POST["linkImg4"];
$introducao = Funcoes::removeCaracterEditor($_POST["introducao"]);
$linkYoutube = $_POST["linkYoutube"];
$possuiMod = false;
$largura = 0;
$altura = 0;
if (array_key_exists("temMod", $_POST)) {
    $possuiMod = true;
} else {
    $possuiMod = false;
}
if (array_key_exists("mudaImagem", $_POST)) {
    $largura = 300;
    $altura = 590;
} else {
    $largura = 590;
    $altura = 350;
}
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
    header("location: ../../pagina-erro.php?onde=android");
    die();
}
// tenta mudar para algumDiretorio
if (!ftp_chdir($conn_id, $diretorioRemotoImg)) {
    addDanger("Não foi possivel mudar o diretorio<br>Diretorio Atual: " . ftp_pwd($conn_id));
    header("location: ../../pagina-erro.php?onde=android");
    die();
}
//pega as partes importantes do site.
try {
    $banco = new Banco();

    $codigoSite = Funcoes::pegaCodigo($linkDoSite);
    $nomeJogo = Funcoes::pegaNome($codigoSite);
    $quantDown = Funcoes::pegaQuantDown($linkDoSite);
    $nomeSemCaracter = Funcoes::remover_caracteres($nomeJogo);
    $nomeParaImagem = str_replace(" ", "-", $nomeSemCaracter);
    $descricao = Funcoes::pegaDescricao($codigoSite);
    $descricaoSemCode = strip_tags($descricao);
    $parteDoLink = Funcoes::pegaPartLink($linkDoSite);
    $tamanhosArquivos = Funcoes::pegaTamanhos($codigoSite);
    $localInstall = Funcoes::pegaLocalInstall($codigoSite);
    $categoria = Funcoes::pega_categoria($linkDoSite);
    $link_fars = Funcoes::separar_link_fars($link_fars);
    $tr = new TranslateClient('ru', 'pt-br');
    $descricaoTr = $tr->translate($descricaoSemCode);
    $categoria = $tr->translate($categoria);

    //compacta imagem. 
    $contador = 3;
    $nomeImagem = array();
    $imagem = \Tinify\fromUrl($linkImgCapa);
    $nomeImagem[] = $nomeParaImagem . ($contador++);
    $imagem->toFile("../../img/" . $nomeImagem[0] . ".png");
    $imagem = \Tinify\fromUrl($linkImg1);
    $nomeImagem[] = $nomeParaImagem . ($contador++);
    $imagem->toFile("../../img/" . $nomeImagem[1] . ".png");
    $imagem = \Tinify\fromUrl($linkImg2);
    $nomeImagem[] = $nomeParaImagem . ($contador++);
    $imagem->toFile("../../img/" . $nomeImagem[2] . ".png");
    $imagem = \Tinify\fromUrl($linkImg3);
    $nomeImagem[] = $nomeParaImagem . ($contador++);
    $imagem->toFile("../../img/" . $nomeImagem[3] . ".png");
    $imagem = \Tinify\fromUrl($linkImg4);
    $nomeImagem[] = $nomeParaImagem . ($contador++);
    $imagem->toFile("../../img/" . $nomeImagem[4] . ".png");

    transferirFtpImg($conn_id, $nomeImagem);
    ftp_close($conn_id);

    $linkDeDownload = "protetor.therevolution.com.br/mrandroid/down/?id=" . $parteDoLink .= $possuiMod ? "&mod=1" : "&mod=0";
    $linkDeDownload .= empty($link_fars) ? "": "&alt=".$link_fars;
    $downloadLinks[] = $linkDeDownload;
    
    $banco->addLinks($downloadLinks);
    $linkDownloadProtetor = $banco->getListProtetor(count($downloadLinks));
    $banco->closeConexao();

//prepara o code do site.
    $codigo = CodeSite::getIntroducao($nomeSemCaracter, $introducao, $nomeImagem[0]);
    $codigo .= CodeSite::getParagrafo($nomeSemCaracter);
    $codigo .= CodeSite::getTabelas($linkDownloadProtetor, $tamanhosArquivos, $descricaoTr, $possuiMod, $quantDown);
    $codigo .= CodeSite::getComoInstall($quantDown, $localInstall, $possuiMod);
    $codigo .= CodeSite::getYoutube($linkYoutube);
    $codigo .= CodeSite::getImagens($nomeImagem, $largura, $altura);
//adicionar o código na sessão.
    addCodigo($codigo);
    $tags = CodeSite::getTags($nomeSemCaracter);
    $metaDesc = CodeSite::getMetaDesc($nomeSemCaracter);
    $titulo = CodeSite::getTitulo($quantDown, $nomeSemCaracter, $possuiMod);
    $quantImagens = \Tinify\compressionCount();
    addTags($tags);
    addMetaDesc($metaDesc);
    addTitulo($titulo);
    addDesc(strtolower($nomeSemCaracter));
    addQuantImagens($quantImagens);
    add_categoria($categoria);

    header("location: ../../home.php?key=final");
    die();
} catch (Exception $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (InvalidArgumentException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (ErrorException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (UnexpectedValueException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (BadMethodCallException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (\Tinify\ClientException $e) {
    //não é necessário fazer nada! Apenas para não aparecer a mensagem!
} catch (\Tinify\AccountException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (\Tinify\ServerException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
} catch (\Tinify\ConnectionException $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=android");
    die();
}
//upa os links no protetor e retornar os links.
//$linksProtetor = upLinksProtetor($downloadLinks, "jean", "jean@123", "mrandroid");
?>