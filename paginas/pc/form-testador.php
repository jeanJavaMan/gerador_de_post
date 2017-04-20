<?php
require_once("../../util/sessoes.php");
if(array_key_exists("teste", $_GET)){
	$dadosRecebido = $_GET["teste"];
}else{
	$dadosRecebido = false;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Testador Steam</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/gerador.css">
	<link rel="stylesheet" type="text/css" href="../../css/vendor.css">
</head>
<body>
	<div class="principal">
		<div class="col-lg-6 col-lg-offset-3">
			<form method="post" action="testador.php">
				<div class="form-top">
					<div class="form-group">
						<h2 style="text-align: center; color: black; margin-top: 10px;">Testador de Link(s) Steam</h2>
					</div>
				</div>
				<div class="form-bottom">
					<div class="form-group">
						<label>Link da Steam:</label>
						<input type="text" name="linkSteam" class="form-control">
					</div>
					<?php
						if($dadosRecebido){
							$dados = getLog();
							removeLog();
							?>
							<div class="form-group">
								<label>Resultado:</label>
								<div class="editor"><?=$dados?></div>
							</div>
							<?php
						}
					?>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Testar Link</button>
						<a href="../../home.php" style="float: right;" class="btn btn-info">Home</a>
					</div>					
				</div>
			</form>
		</div>
	</div>
</body>
</html>