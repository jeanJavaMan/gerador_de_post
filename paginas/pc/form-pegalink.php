<?php
require_once("../../util/sessoes.php");
if(array_key_exists("separou", $_GET)){
	$dadosRecebido = $_GET["separou"];
}else{
	$dadosRecebido = false;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Separa Links Therevolution</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/gerador.css">
	<link rel="stylesheet" type="text/css" href="../../css/vendor.css">
</head>
<body>
	<div class="principal">
		<div class="col-lg-6 col-lg-offset-3">
			<form method="post" action="pega-link.php">
				<div class="form-top">
					<div class="form-group">
						<h2 style="text-align: center; color: black; margin-top: 10px;">Separador de links Therevolution</h2>
					</div>
				</div>
				<div class="form-bottom">
					<div class="form-group">
						<label>Link do Therevolution:</label>
						<input type="text" name="linkPega" class="form-control">
					</div>
					<?php
						if($dadosRecebido){
							$dados = getLog();
							removeLog();
							?>
							<div class="form-group">
								<label>Resultado:</label>
                                                                <textarea class="form-control" style="height: 200px"><?=$dados?></textarea>
							</div>
							<?php
						}
					?>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Separar Links</button>
						<a href="../../home.php" style="float: right;" class="btn btn-info">Home</a>
					</div>					
				</div>
			</form>
		</div>
	</div>
</body>
</html>