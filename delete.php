<?php

header("Refresh: 3; url=index.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MySQL";

$code = $_POST["cod"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "DELETE FROM php WHERE PHP_COD=$code";
    $conn->exec($sql);
    
    echo "Registro deletado com sucesso!";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>