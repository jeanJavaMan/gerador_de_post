<?php
require_once './sessoes.php';
require '../class/Util.php';
if(usuarioEstaLogado()){
    $type = $_GET["type"];
    $util_log = get_log_class();
    if($util_log->apagar_log($type)){
        header("location: ../home.php");
        remover_log_class();        
    }else{
        echo 'Não foi possivel apagar o arquivo!';
    }
}else{
    header("location: ../index.php");
    die();
}

