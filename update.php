<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MySQL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cod = $_GET["cod"];

    $stmt = $conn->prepare("SELECT * FROM php WHERE php_cod = ".$cod."");
    $stmt->execute();       
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    echo'<form action="/updt.php" method="post">
        Título:<br>
        <input type="text" name="titulo" placeholder="'.$result[0]["PHP_TITULO"].'"><br>
        Assunto:<br>
        <input type="text" name="assunto" placeholder="'.$result[0]["PHP_ASSUNTO"].'"><br>
        Texto:<br>
        <textarea name="texto" cols="35" rows="7"></textarea><br>
        Data:<br>
        <input type="date" name="data" value="'.$result[0]["PHP_DT_INS"].'" ><br>
        <input type="hidden" name="cod" value="'.$cod.'"><br>
        <input type="submit" value="Atualizar">
    </form>';
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>