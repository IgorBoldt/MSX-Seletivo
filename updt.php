<?php

header("Refresh: 3; url=index.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MySQL";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$titulo  = $_POST['titulo'];
$assunto = $_POST['assunto'];
$texto  = $_POST['texto'];
$data = $_POST['data'];
$cod = $_POST['cod'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM php WHERE php_cod = ".$cod."");
    $stmt->execute();       
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    if($titulo != ""){    
        $sql = 'UPDATE php SET PHP_TITULO="'.$titulo.'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }else{
        $sql = 'UPDATE php SET PHP_TITULO="'.$result[0]["PHP_TITULO"].'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    if($assunto != ""){
        $sql = 'UPDATE php SET PHP_ASSUNTO="'.$assunto.'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute();    
    }else{
        $sql = 'UPDATE php SET PHP_ASSUNTO="'.$result[0]["PHP_ASSUNTO"].'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
    }

    if($texto != ""){
        $sql = 'UPDATE php SET PHP_TEXTO="'.$texto.'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute();    
    }else{
        $sql = 'UPDATE php SET PHP_TEXTO="'.$result[0]["PHP_TEXTO"].'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
    }

    if($data != ""){
        $sql = 'UPDATE php SET PHP_DT_INS="'.$data.'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute();    
    }else{
        $sql = 'UPDATE php SET PHP_DT_INS="'.$result[0]["PHP_DT_INS"].'" WHERE php_cod="'.$cod.'"';
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
    }

    echo "Cadastro atualizado com sucesso!";
    }
catch(PDOException $e)
    {
        echo "Erro: " . $e->getMessage();
    }

$conn = null;
?>