<?php
require_once("../../util/sessoes.php");
$link = $_POST["linkPega"];
if(empty($link)){
	$link = "http://therevolution.com.br/post-sitemap1.xml";
}
$codigo = file_get_contents($link);
$pattern = "/<loc>(.*?)<\/loc>/";
preg_match_all($pattern, $codigo,$resultado);
$log = "";
foreach ($resultado[1] as $linkEncontrado){
    $log .= $linkEncontrado."\n";
}
addlog($log);
header("location: form-pegalink.php?separou=1");
die();



