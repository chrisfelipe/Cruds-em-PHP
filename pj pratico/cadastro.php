<?php
 require 'config.php';
    if(isset($_POST['nome'])&& empty($_POST['email'])==false && empty($_POST['senha'])==false){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $sql = "INSERT INTO usuarios SET  nome = '$nome', email='$email',senha = '$senha'";
        $sql = $pdo->query($sql);
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #643d87;
        }
        #logar{
            width:500px;
            height:500px;
            padding-top:100px;
            margin:auto;
            
            
        }
        #logar img{
            float:left;
        }
    </style>
</head>
<body>
    <div id="logar">
    <form action="" method="POST">
        nome: <br>
        <input type="text" name="nome"><br><br>
        E-mail: <br>
        <input type="text" name="email"><br><br>
        Senha: <br>
        <input type="text" name="senha"><br><br>

        <input type="submit" name="cadastrar"><br><br>
        <img src="assets/imgs/redacao.png" alt="">
        </div>
    </form>
</body>
</html>