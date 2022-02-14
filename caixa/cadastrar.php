<?php
    session_start();
    require 'config.php';
    if(isset($_POST['nome'])){
        $titular =$_POST['nome'];
        $agencia = $_POST['agencia'];
        $conta = $_POST['conta'];
        $senha = $_POST['senha'];
        $saldo = $_POST['saldo'];
        $saldo = floatval($saldo);
        $sql = $pdo->prepare("INSERT INTO contas (titular,conta,Agencia,senha,saldo) VALUES (:titular,:conta,:agencia,:senha,:saldo) ");
        $sql->bindValue(":nome", $titular);
        $sql->bindValue(":agencia", $agencia);
        $sql->bindValue(":conta", $conta);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":saldo",$saldo);
        $sql->execute();
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>caixa eletronico</title>
</head>
<body>
    <form method="POST">
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Agencia: <br>
        <input type="text"  pattern="[0-9.,]{1,}" name="agencia"> <br><br>
        Conta: <br>
        <input type="text"  pattern="[0-9.,]{1,}" name="conta"> <br><br>
        Senha: <br>
        <input type="text"  pattern="[0-9.,]{1,}" name="senha"> <br><br>

        Saldo: <br>
        
        <input type="text"  pattern="[0-9.,]{1,}" name="saldo"> <br><br>


        <input type="submit" value="enviar">

    
    
    </form>
</body>
</html>