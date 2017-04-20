<?php
require_once("util/sessoes.php");
if(usuarioEstaLogado()){
	header("location: home.php");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gerador De Post Therevolution</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Login">
	<link href="css/vendor.css" rel="stylesheet" type="text/css">
	<link href="css/app.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/gerador.css">
	</head>
	<body>
		<div class="auth">
			<div class="auth-container">
				<div class="card">
					<header class="auth-header">
						<h1 class="auth-title">
							<div class="logo">
								<span class="l l1"></span>
								<span class="l l2"></span>
								<span class="l l3"></span>
								<span class="l l4"></span>
								<span class="l l5"></span>
							</div>
							Gerador de Post TheRevolution
						</h1>
					</header>
					<div class="auth-content">
						<p class="text-xs-center">Entre para continuar</p>
						<form id="login-form" action="util/verificaUser.php" method="post">
							<div class="form-group">
								<label for="username">Usuário</label>
								<input type="text" class="form-control underlined" name="usuario" id="usuario" placeholder="Coloque seu usuário" required></div>
								<div class="form-group">
									<label for="password">Senha</label>
									<input type="password" class="form-control underlined" name="senha" id="senha" placeholder="Coloque sua Senha" required></div>

									<div class="form-group">
										<button type="submit" class="btn btn-block btn-primary">Login</button>
									</div>
								</form>
							</div>
						</div>
						<div class="text-xs-center" style="color: white;">
							<h7><strong>By: Mr.Android</strong></h7>
						</div>
					</div>
				</div>
			</body>
			</html>