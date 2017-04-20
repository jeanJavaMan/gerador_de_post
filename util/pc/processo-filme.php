<?php

require_once("../../util/pc/Funcoes.php");
require_once '../../class/Banco.php';
require_once("../../util/sessoes.php");
require_once("../../util/pc/PostCode.php");
require_once("../ftptransfer.php");
try {
    $banco = new Banco();
    $nomeFilme = $_POST["nomeFilme"];
    $informacoes = $_POST["informacoes"];
    $introducao = $_POST["introducao"];
    $linkImgCapa = $_POST["imgCapa"];
    $linkImg1 = $_POST["img1"];
    $linkImg2 = $_POST["img2"];
    $linkImg3 = $_POST["img3"];
    $sinopse = $_POST["sinopse"];
    $elenco = $_POST["elenco"];
    $dados = $_POST["dados"];
    $trailer = $_POST["trailer"];
    //começa a conexao com o ftp
    $serverHost = '158.69.208.186';
    $serverUser = 'webmaster';
    $serverPass = 'riWejen6';
    $diretorioRemotoImg = "wp-content/uploads/2016/img";
    $diretorioRemotoTorrent = "../../../../torrents/";
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
        addDanger("Não foi possivel mudar o diretorio<br>Diretorio Atual: " . ftp_pwd($conn_id));
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    }
    if (array_key_exists("semTorrent", $_POST)) {
        $semTorrent = true;
        $linkTorrent = "";
    } else {
        $semTorrent = false;
        $diretorio = "../../torrent/";
        $arqUpload = $diretorio . "[therevolution.com.br]" . $_FILES["arquivo"]["name"];
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $arqUpload)) {
            $linkTorrent = "therevolution.com.br/torrents/[therevolution.com.br]" . $_FILES["arquivo"]["name"];
        }
    }
    $imagens = [];
    $linksImg = array($linkImg1, $linkImg2, $linkImg3);

    if (copy($linkImgCapa, "../../img/" . $nomeFilme . date("d-m-y") . ".png")) {
        $imagens[] = $nomeFilme . date("d-m-y");
    } else {
        $imagens[] = "";
    }
    for ($i = 0; $i < count($linksImg); $i++) {
        if (copy($linksImg[$i], "../../img/" . $nomeFilme . $i . date("d-m-y") . ".png")) {
            $imagens[] = $nomeFilme . $i . date("d-m-y");
        } else {
            $imagens[] = "";
        }
    }
    transferirFtpImg($conn_id, $imagens);
    if (!$semTorrent) {
        if (!ftp_chdir($conn_id, $diretorioRemotoTorrent)) {
            addDanger("Não foi possivel mudar o diretorio<br>Diretorio Atual: " . ftp_pwd($conn_id));
            header("location: ../../pagina-erro.php?onde=pc");
            die();
        }

        transferirFtpTorrent($conn_id, "[therevolution.com.br]" . $_FILES["arquivo"]["name"]);
        ftp_close($conn_id);
        $downLinkTorrent[] = $linkTorrent;
        $banco->addLinks($downLinkTorrent);
        $linksProtetor = $banco->getListProtetor(count($downLinkTorrent));
    } else {
        $linksProtetor[] = "";
    }

    $post = new PostCode();
    $codigo = "";
    $codigo .= $post->getIntroducao($introducao);
    $codigo .= $post->getImagemCapa($imagens);
    $codigo .= $post->getCapaInfoFilme($nomeFilme, $informacoes);
    $codigo .= $post->getSinopseFilme($sinopse, $linksProtetor[0], $elenco, $dados);
    $codigo .= $post->getScreenFilme($imagens, $trailer);

    $titulo_do_post = $post->getTituloFilme($nomeFilme);
    $meta = $post->getMetaDescFilme($nomeFilme);
    $tags = $post->getTagsFilme($nomeFilme);

    addCodigo($codigo);
    addTags($tags);
    addMetaDesc($meta);
    addTitulo($titulo_do_post);
    addDesc(strtolower($nomeFilme));

    header("location: ../../home.php?key=final");
    die();
} catch (Exception $e) {
    addDanger($e->getMessage());
    header("location: ../../pagina-erro.php?onde=pc");
    die();
}

