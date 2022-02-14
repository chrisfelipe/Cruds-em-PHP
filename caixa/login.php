<?php
    session_start();
    require 'config.php';
    if(isset($_POST['agencia'])&& empty($_POST['agencia'])==false){
        $agencia = addslashes($_POST['agencia']);
        $conta = addslashes($_POST['conta']);
        $senha = addslashes($_POST['senha']);
        $sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia and conta = :conta and senha = :senha");
        $sql->bindValue(":agencia",$agencia);
        $sql->bindValue(":conta",$conta);
        $sql->bindValue(":senha",md5($senha));
        $sql->execute();
        if($sql->rowCount()> 0){
            $sql = $sql->fetch();
            $_SESSION['banco']= $sql['id'];
            header("location: index.php");
            exit;
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa eletronico</title>
</head>
<body>
    <form method="POST">
        Agencia: <br>
        <input type="text" name="agencia"><br> <br>
        Conta: <br>
        <input type="text" name="conta"><br> <br>
        Senha: <br>
        <input type="password" name="senha"><br> <br>
        <input type="submit" value="enviar">
        <a href="cadastrar.php">Cadastrar</a>
    </form>
</body>
</html>