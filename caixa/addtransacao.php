<?php
session_start();
require 'config.php';
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    $valor = str_replace(",",".",$_POST['valor']);
    $valor = floatval($valor);
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao)values (:id_conta,:tipo,:valor, now())");
    $sql->bindValue(":id_conta",$id);
    $sql->bindValue(":tipo",$tipo);
    $sql->bindValue(":valor",$valor);
    $sql->execute();
    if ($tipo == '0'){
        //deposito
        $sql = $pdo->prepare("UPDATE contas set saldo = saldo +:valor WHERE id =:id");
        $sql->bindValue(":valor",$valor);
        $sql ->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    }else{
    //saque
    $sql = $pdo->prepare("UPDATE contas set saldo = saldo -:valor WHERE id =:id");
    $sql->bindValue(":valor",$valor);
    $sql ->bindValue(":id", $_SESSION['banco']);
    $sql->execute();
    }
    header("location: index.php");
    exit;
    
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
    tipo transação: <br>
    <select name="tipo" id="">
        <option value="0">Deposito</option>
        <option value="1">Retirada</option>
    </select><br> <br>
    Valor: <br>
    <input type="text" name="valor"  pattern="[0-9.,]{1,}"> <br><br>
    
    <input type="submit" value="Adicionar">
    </form>
</body>
</html>