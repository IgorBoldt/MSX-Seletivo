<!DOCTYPE html>
<html>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    td, th {
        border: 1px solid #000000;
        text-align: left;
        padding: 8px;
    }
    .marg {
        margin-top: 20px;
    }
    </style>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Assunto</th>
            <th>Texto</th>
            <th>Data de Inserção</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MySQL";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $stmt = $conn->prepare("SELECT * FROM php");
        $stmt->execute();       
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $cont = 0;

        foreach($result as $value)
        {
        $formdt = date("d-m-Y", strtotime($result[$cont]["PHP_DT_INS"]));
        echo'<tr>
                <td>'.$result[$cont]["PHP_TITULO"].'</td>
                <td>'.$result[$cont]["PHP_ASSUNTO"].'</td>
                <td>'.$result[$cont]["PHP_TEXTO"].'</td>
                <td>'.$formdt.'</td>
                <td><form action="/update.php" method=post">
                <input type="hidden" name="cod" value="'.$result[$cont]["PHP_COD"].'">
                    <input type="submit" value="Alterar">
                    </form>
                </td>
                <td><form action="/delete.php" method="post">
                    <input type="hidden" name="cod" value="'.$result[$cont]["PHP_COD"].'">
                    <input type="submit" value="Deletar">
                    </form>
                </td>                
                </tr>';
        $cont++;
        }
    }
    catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    $conn = null;
?>
    </table>
    
    <form action="/formularios.php" class="marg">
        <input type="submit" value="Incluir">
    </form>
</html>