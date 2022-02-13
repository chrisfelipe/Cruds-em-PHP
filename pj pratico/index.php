<?php
session_start();
require 'config.php';
if(isset($_POST['email'])&& empty($_POST['senha'])==false){
	$email = $_POST['email'];
	$senha =md5($_POST['senha']);
	$sql ="SELECT * FROM usuarios WHERE email ='$email' and senha ='$senha'";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0){
		header("location:autenticado.html");
	}else{
		echo "Usuario ou senha invalidos";
	}
}
?>

<!DOCTYPE html> 
<html lang="pt-br">
<head>
	<title>login </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/estilo.css">
</head>
<body>
	<div id="container">
		<img src="assets/imgs/do-utilizador.png">
		<form method="POST">
			<div>
				<input class="email"type="text" name="email" id="email"
				placeholder="digite seu email">
			</div>
			<div>
				<input class="senha" type="password" name="senha" id="senha"
				placeholder="digite sua senha">
			</div>
			<div>
				<input class="submit" type="submit" value="logar">
			</div>
            <div id="cad">
                <a href="cadastro.php">Cadastrar</a>
				
            </div>
			
		</form>

	</div>
</body>
</html>