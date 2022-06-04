<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
      $mysql->query("delete from stock where CODIGO_STOCK =$_REQUEST[codigo]") or
        die($mysql->error);    
    
$mysql->close();

header('Location:sotckInicio.php');  
?>