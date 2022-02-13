<?php
    try{
        $dsn=("mysql:dbname=pj_pratico;host=localhost");
        $dbuser = "root";
        $dbpass = "";
        $pdo = new PDO($dsn,$dbuser,$dbpass);
        
    }catch(PDOExcpetion $e){
        echo "erro:".$e->GetMessage();

    }
?>