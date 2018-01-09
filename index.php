<?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	require_once('conexao.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
	<title> Login de Usuário </title>
	<link type="text/css" rel="stylesheet" href="estilo1.css"/>
	</head>
	<body>
		<h1>Login</h1>
		<form method="POST" action="login.php">
		<label>Login:</label><input type="text" name="loginid" id="login"><br>
		<label>Senha:</label><input type="password" name="senha" id="senha"><br>
		<input type="submit" value="Entrar" id="entrar" name="entrar">
		<a href="cadastro.html">Cadastre-se</a>
		</form>
	</body>
</html>