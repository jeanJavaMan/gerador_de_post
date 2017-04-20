<?php require_once("util/sessoes.php");

$erro = "Nenhum erro foi encontrado!";
if(existeDanger()){
 $erro = getDanger();
 removeDanger();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página de Erros</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/gerador.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
</head>
<body>
<div class="principal col-lg-6 col-lg-offset-3">
	<div class="form-top">
		<div class="form-group text-center">
			<h2>Página de Erros</h2>
		</div>
		<div class="form-group text-center">
			<h7>Os seguintes erros foram encontrados ao decorrer do processo!</h7>
		</div>
	</div>
	<div class="form-bottom">
		<div class="text-center"><label>ERROS</label></div>
		<div class="form-group editor"><?=$erro?><br></div>
		<div><a href="home.php" class="btn btn-success">Home</a>
		<a href="util/logout.php" class="btn btn-danger" style="float: right;">Sair</a></div>
	</div>
</div>

</body>
</html>