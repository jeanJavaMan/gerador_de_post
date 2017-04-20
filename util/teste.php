<?php
require_once("sessoes.php");
$nomeImagem[] = "Angry-Birds-23.png";
$nomeImagem[] = "Angry-Birds-24.png";
$nomeImagem[] = "Angry-Birds-25.png";
$nomeImagem[] = "Angry-Birds-26.png";

$serverHost = '158.69.208.186';
$serverUser = 'webmaster';
$serverPass = 'riWejen6';
$diretorioRemotoImg = "wp-content/uploads/2016/img";
$diretorioRemotoTorrent = "../../../../torrents/";
$dirRaiz = "/";
// estabelece a conexão
$conn_id = ftp_connect($serverHost);

// login com o nome de usuário e senha
$login_result = ftp_login($conn_id, $serverUser, $serverPass);

// confere a conexão
if ((!$conn_id) || (!$login_result)) {
    addDanger("Não foi possivel se conectar com o servidor FTP");
    header("location: ../pagina-erro.php?onde=pc");
    die();
}
// tenta mudar para algumDiretorio
if (!ftp_chdir($conn_id, $diretorioRemotoImg)) {
    addDanger("Não foi possivel mudar o diretorio Imagem<br>Diretorio Atual: " . ftp_pwd($conn_id));
    header("location: ../pagina-erro.php?onde=pc");
    die();
}

if (!ftp_chdir($conn_id, $diretorioRemotoTorrent)) {
    addDanger("Não foi possivel mudar o diretorio Raiz<br>Diretorio Atual: " . ftp_pwd($conn_id));
    header("location: ../pagina-erro.php?onde=pc");
    die();
}else{
    echo "Dir atual: ". ftp_pwd($conn_id);
}