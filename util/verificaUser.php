<?php
require_once("sessoes.php");
require_once("../class/Usuario.php");
require_once("../paginas/acesso-negado.php");
?>
	<html>
	<title>Negado</title>
	<meta name="description" content="Tela de Controle">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/vendor.css">
	<link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/vendor.js"></script>
	<script src="../js/app.js"></script>
<body>
<?php
if(array_key_exists("usuario",$_POST) && array_key_exists("senha",$_POST)){
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	if($usuario == "jean" && $senha = "jean@123"){
		$usuario = new Usuario(1,"Mr Android","1");
		usuarioLogado($usuario);
		header("location: ../home.php");

	}else if($usuario == "root" && $senha == "root123"){
		$usuario = new Usuario(2,"Piratinha","2");
		usuarioLogado($usuario);
		header("location: ../home.php");

	}else{
		acesso_negado("../index.php");
	}
}else{
	acesso_negado("../index.php");
}
?>
</body>
	</html>

