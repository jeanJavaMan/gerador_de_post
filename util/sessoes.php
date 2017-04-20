<?php

session_start();

function usuarioLogado(Usuario $usuario) {
    $_SESSION["usuario_logado"] = serialize($usuario);
}

function usuarioEstaLogado() {
    return isset($_SESSION["usuario_logado"]);
}

function getUsuario() {
    return unserialize($_SESSION["usuario_logado"]);
}

function addCodigo($codigo) {
    $_SESSION["codigo_gerado"] = $codigo;
}

function addTags($tags) {
    $_SESSION["tags"] = $tags;
}

function addMetaDesc($metaDesc) {
    $_SESSION["metaDesc"] = $metaDesc;
}

function addTitulo($titulo) {
    $_SESSION["titulo"] = $titulo;
}

function addDesc($desc) {
    $_SESSION["desc"] = $desc;
}

function add_categoria($categoria){
    $_SESSION["categoria"] = $categoria;
}

function get_categoria(){
    if(isset($_SESSION["categoria"])){
    return $_SESSION["categoria"];
    }else{
        return "";
    }
}

function getCodigo() {
    return $_SESSION["codigo_gerado"];
}

function getTags() {
    return $_SESSION["tags"];
}

function getTitulo() {
    return $_SESSION["titulo"];
}

function getMetaDesc() {
    return $_SESSION["metaDesc"];
}

function getDesc() {
    return $_SESSION["desc"];
}

function logout() {
    session_destroy();
}

function addLog($log) {
    $_SESSION["log"] = $log;
}

function getLog() {
    return $_SESSION["log"];
}

function removeLog() {
    unset($_SESSION["log"]);
}

function addQuantImagens($quantidadeImagensPorMes) {
    $_SESSION["quantImagens"] = $quantidadeImagensPorMes;
}

function getQuantImagens() {
    if (isset($_SESSION["quantImagens"])) {
        return $_SESSION["quantImagens"];
    } else {
        return "x?";
    }
}

function addDanger($danger) {
    $_SESSION["danger"] = $danger;
}

function existeDanger() {
    return isset($_SESSION["danger"]);
}

function getDanger() {
    return $_SESSION["danger"];
}

function removeDanger() {
    unset($_SESSION["danger"]);
}

function addLinkCodificado($links) {
    $_SESSION["linksCodificado"] = $links;
}

function removerLinkCodificado() {
    unset($_SESSION["linksCodificado"]);
}

function existeLinksCodificado() {
    return isset($_SESSION["linksCodificado"]);
}

function getLinkCodificado() {
    return $_SESSION["linksCodificado"];
}

function add_log_class(Util\Util $util_log) {
    if (!isset($_SESSION["log_util"])) {
        $_SESSION["log_util"] = serialize($util_log);
    }
}

function get_log_class() {
    if (isset($_SESSION["log_util"])) {
        return unserialize($_SESSION["log_util"]);
    } else {
        return new Util\Util();
    }
}

function remover_log_class() {
    unset($_SESSION["log_util"]);
}
