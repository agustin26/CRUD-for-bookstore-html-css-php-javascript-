<?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
      die("Problemas con la conexión a la base de datos");
    
     $mysql->query("INSERT INTO ciudad (CODIGO_CIUDAD ,nombre_ciudad)
     VALUES ($_REQUEST[codigo],'$_REQUEST[nombre]');") or die($mysql->error);
      

    $mysql->close();

    header('Location:CiudadInicio.php');  
   
    
?>  