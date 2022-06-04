<?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
      die("Problemas con la conexión a la base de datos");
    
     $mysql->query("INSERT INTO tipo_producto (CODIGO_TIPO_PRODUCTO,nombre,marca)
     VALUES ($_REQUEST[codigo],'$_REQUEST[nombre]','$_REQUEST[marca]');") or die($mysql->error);
      

    $mysql->close();

    header('Location:tipoInicio.php');  
   
    
?>  