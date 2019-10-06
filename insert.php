<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MySQL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $titulo  = $_POST['titulo'];
    $assunto = $_POST['assunto'];
    $texto  = $_POST['texto'];
    $data = $_POST['data'];

    $stmt = $conn->prepare("INSERT INTO php (php_titulo, php_assunto, php_texto, php_dt_ins) 
                            VALUES (:titulo, :assunto, :texto, :data)");

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':assunto', $assunto);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':data', $data);

    $result = $stmt->execute();

    header("Refresh: 3; url=index.php");
    echo "Registro inserido com sucesso!";
}
catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
    $conn = null;
?>