<?php
require_once("../../util/sessoes.php");
function verificaCode($codeSite,$pattern,$nomePattern){
$resultado = preg_match_all($pattern, $codeSite, $retorno);
if($resultado == 0){
	return "<strong>".$nomePattern."</strong>:<font color='red'> Não encontrada!</font><br>";
}else{
	return "<strong>".$nomePattern."</strong>:<font color='green'> Encontrada!</font><br>";
	
}
}
$link = $_POST["linkSteam"];
if(empty($link)){
	$link = "www.google.com.br";
}
$codigoSite = file_get_contents($link);
$log = "Resultados do link: <a href='".$link."' target='_blank'>".$link."</a><br>";
$log.= verificaCode($codigoSite,'/<div class="game_description_snippet">(.*?)<\/div>/s',"Introdução");
$log.= verificaCode($codigoSite,'/<h2>About.*?<\/h2>(.*?)<div/s',"Descrição");
$log.= verificaCode($codigoSite,'/class=\"apphub_AppName">(.*?)<\/div/',"Titulo");
$log.= verificaCode($codigoSite,'/<b>Genre:<\/b> <a href=\".*?">(.*?)<\/a><br>/s',"Gêneros");
$log.= verificaCode($codigoSite,'/<b>Release Date:<\/b>(.*?)<br>/s',"Data lançamento");
$log.= verificaCode($codigoSite,'/<b>Publisher:<\/b>(.*?)<br>/s',"Distribuidora");
$log.= verificaCode($codigoSite,'/<b>Developer:<\/b>(.*?)<br>/s',"Desenvolvedor");
$log.= verificaCode($codigoSite,'/itemprop=\"description">(.*?)<\/span>/s',"Classificação");
$log.= verificaCode($codigoSite,'/<span class=\"responsive_hidden">(.*?)<\/span>/s',"Análise");
$log.= verificaCode($codigoSite,'/<strong>Minimum:<\/strong>(.*?)<\/ul>/s',"Requisito Mínimo");
$log.= verificaCode($codigoSite,'/<strong>Recommended:<\/strong>(.*?)<\/ul>/s',"Requisito Recomendado");
$log.= verificaCode($codigoSite,'/class=\"name".*?>(.*?)<\/a>/s',"Tipo Jogo");
addlog($log);
header("location: form-testador.php?teste=1");
die();
