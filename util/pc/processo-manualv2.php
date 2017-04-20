<?php

require_once("../../util/pc/Funcoes.php");
require_once("../../vendor/autoload.php");
require_once("../../util/pc/PostCode.php");
require_once("../../util/sessoes.php");
require_once("../ftptransfer.php");
require_once '../../class/Banco.php';

use Stichoza\GoogleTranslate\TranslateClient;

\Tinify\setKey("JZVzo6dJAFGSRznLbvv5kzif1R7zLRI_");
if (array_key_exists("fonte", $_POST)) {
    $codeSiteSteam = $_POST["fonte"];
    $nomeLancamento = $_POST["nomeLancamento"];
    $tamanhoArquivo = $_POST["tamanhoArquivo"];
    $linkOficial = $_POST["siteOficial"];
    $linkSteam = $_POST["linkSteam"];
    $linkNfo = $_POST["nfo"];
    $linkImgCapa = $_POST["imgCapa"];
    $linkImg1 = $_POST["img1"];
    $linkImg2 = $_POST["img2"];
    $linkImg3 = $_POST["img3"];
    $link_trailer = $_POST["trailer-link"];
    if (array_key_exists("semTorrent", $_POST)) {
        $semTorrent = true;
    } else {
        $semTorrent = false;
    }
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
        addDanger("Não foi possivel mudar o diretorio<br> ImagemDiretorio Atual: " . ftp_pwd($conn_id));
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    }

    try {
        $banco = new Banco();

        $introducao = Funcoes::pegaIntroducao($codeSiteSteam);
        $nomeJogo = Funcoes::pegaTitulo($codeSiteSteam);
        $descricao = Funcoes::pega_descricao_v2($codeSiteSteam);
        $generos = Funcoes::pega_generos_v2($codeSiteSteam);
        $dataLancamento = Funcoes::pega_data_v2($codeSiteSteam);
        $distribuidora = Funcoes::pega_distribuidora_v2($codeSiteSteam);
        $desenvolvedor = Funcoes::pega_desenvolvedor_v2($codeSiteSteam);
        $classificacao = Funcoes::pegaClassificacao($codeSiteSteam);
        $analise = Funcoes::pegaAnalise($codeSiteSteam);
        $requisitoMin = Funcoes::pega_requisito_min_v2($codeSiteSteam);
        $requisitoMax = Funcoes::pega_requisito_max_v2($codeSiteSteam);
        $tipoJogo = Funcoes::pegaTipoJogo($codeSiteSteam);

        if (!$semTorrent) {
            $diretorio = "../../torrent/";
            $arqUpload = $diretorio . "[therevolution.com.br]" . $_FILES["arquivo"]["name"];
            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $arqUpload)) {
                $linkTorrent = "therevolution.com.br/torrents/[therevolution.com.br]" . $_FILES["arquivo"]["name"];
            } else {
                addDanger("Houve um erro ao upar o arquivo torrent");
                header("location: ../../pagina-erro.php?onde=pc");
                die();
            }
            $downLinkTorrent[] = $linkTorrent;
            //aqui coloca o link no protetor, ele chama a função do arquivo upProtetor.php
            //$linksProtetor = upLinksProtetor($downLinkTorrent, "root", "root123", "piratinha");
            $banco->addLinks($downLinkTorrent);
            $linksProtetor = $banco->getListProtetor(count($downLinkTorrent));
        } else {
            $linksProtetor[] = "";
        }
        $nomeJogo = Funcoes::removerCaracteres($nomeJogo);
        $nomeParaImagem = str_replace(" ", "-", $nomeJogo);
        if (array_key_exists("traducao", $_POST)) {
            $tr = new TranslateClient('en', 'pt-br');
            $introducao = $tr->translate($introducao);
            $descricao = $tr->translate($descricao);
            $generos = $tr->translate($generos);
            $classificacao = $tr->translate($classificacao);
            $analise = $tr->translate($analise);
            $requisitoMin = str_replace("/ ", "/", $tr->translate($requisitoMin));
            $requisitoMax = str_replace("/ ", "/", $tr->translate($requisitoMax));
            $dataLancamento = $tr->translate($dataLancamento);
        }

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

        transferirFtpImg($conn_id, $nomeImagem);

        if (!$semTorrent) {
            // tenta mudar para algumDiretorio
            if (!ftp_chdir($conn_id, $diretorioRemotoTorrent)) {
                addDanger("Não foi possivel mudar o diretorio Torrent<br>Diretorio Atual: " . ftp_pwd($conn_id));
                header("location: ../../pagina-erro.php?onde=pc");
                die();
            }
            try {
                transferirFtpTorrent($conn_id, "[therevolution.com.br]" . $_FILES["arquivo"]["name"]);
                ftp_close($conn_id);
            } catch (Exception $e) {
                addDanger($e->getMessage());
                header("location: ../../pagina-erro.php?onde=pc");
                die();
            }
        } else {
            ftp_close($conn_id);
        }

        $post = new PostCode();
        $codigo = "";
        $codigo .= $post->getIntroducao($introducao);
        $codigo .= $post->getImagemCapa($nomeImagem);
        $codigo .= $post->getCapaInfo($nomeJogo, $generos, $desenvolvedor, $distribuidora, $dataLancamento, $tipoJogo, $classificacao, $analise);
        $codigo .= $post->getTamanho($nomeLancamento, $tamanhoArquivo, $linkSteam, $linkOficial, $linkNfo);
        $codigo .= $post->getDescricao($descricao);
        $codigo .= $post->getDownload($linksProtetor[0],$nomeJogo);
        $codigo .= $post->getImagens($nomeImagem);
        $codigo .= $post->getComoInstalar($link_trailer);
        $codigo .= $post->getRequisitos($requisitoMin, $requisitoMax);

        $metaDesc = $post->getMetaDesc($nomeJogo);
        $tags = $post->getTags($nomeJogo);
        $titulo = $post->getTituloPost($nomeJogo);

        addCodigo($codigo);
        addTags($tags);
        addMetaDesc($metaDesc);
        addTitulo($titulo);
        addDesc(strtolower($nomeJogo));
        $quantImagens = \Tinify\compressionCount();
        addQuantImagens($quantImagens);

        header("location: ../../home.php?key=final");
    } catch (Exception $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (InvalidArgumentException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (ErrorException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (UnexpectedValueException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (BadMethodCallException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (\Tinify\ClientException $e) {
        //não é necessário fazer nada! Apenas para não aparecer a mensagem!
    } catch (\Tinify\AccountException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (\Tinify\ServerException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    } catch (\Tinify\ConnectionException $e) {
        addDanger($e->getMessage());
        header("location: ../../pagina-erro.php?onde=pc");
        die();
    }
} else {
    ?>
    <p class="alert-danger">Dados não foram encontrados <a href="../../home.php">Clique aqui para voltar</a></p>
    <?php

}
die();
