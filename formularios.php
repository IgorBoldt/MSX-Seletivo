<?php
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html>
  <head>
  
  </head>

  <body>
    <form action="/insert.php" method="post">
      Título:<br>
      <input type="text" name="titulo" maxlength="40"><br>
      Assunto:<br>
      <input type="text" name="assunto" maxlength="65"><br>
      Texto:<br>
      <textarea name="texto" cols="35" rows="7"></textarea><br>
      Data de Inserção:<br>
      <input type="date" value ="<?php echo date('Y-m-d') ?>" name="data"><br><br>
      <input type="submit" value="Enviar">
    </form>
  </body>
<html>