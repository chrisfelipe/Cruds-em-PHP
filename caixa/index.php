<?php
Session_start();
require 'config.php';

if(isset($_SESSION['banco'])&& empty($_SESSION['banco'])==false){
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare("SELECT * FROM contas WHERE  id = :id");
    $sql->bindValue(":id",$id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $info = $sql -> fetch();
    }else{
        header("location: login.php");
        exit;
    }


}else{
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>caixa eletronico</title>
    <style>
        #pos{
            color:green;
        }
        #neg{
            color:red;
        }
    </style>
</head>
<body>
    <h1>Banco xyz</h1>
    Titular: <?php echo $info['titular']?> <br>
    Agencia: <?php echo $info['Agencia']?> <br>
    Conta: <?php echo $info['conta']?>  <br>
    Saldo: <?php echo $info['saldo']?>  <br>
    <a href="sair.php">Sair</a>
    <hr>
    <h3>Movimentação/Extrato</h3>
    <a href="addtransacao.php">Adicionar transação</a> <br><br>
    <table border="1" width="400"> 
        <tr>
            <th>Data</th>
            <th>Valor</th>

        </tr>
        <?php
        $sql = $pdo->prepare("SELECT * FROM historico where id_conta = $id" );
        $sql->execute();
        
        if($sql->rowCount()> 0){
            foreach($sql->fetchAll() as $item){

                ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i',strtotime($item['data_operacao']))?></td>
                    <td>
                        <?php if($item['tipo']== '0'):?>
                    <span color="green" id= "pos"> R$<?php echo $item['valor']?></span></td>
                    <?php else: ?>
                        <span color="red" id="neg"> -R$<?php echo $item['valor']?></span></td>
                    <?php endif;?>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>