<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
      $mysql->query("delete from proveedor where CODIGO_PROVEEDOR=$_REQUEST[codigo]") or
        die($mysql->error);    
    
$mysql->close();

header('Location:proveeInicio.php');  
?>