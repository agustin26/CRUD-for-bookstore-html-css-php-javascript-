<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
      $mysql->query("delete from ciudad where CODIGO_CIUDAD=$_REQUEST[codigo]") or
        die($mysql->error);    
    
$mysql->close();

header('Location:CiudadInicio.php');  
?>