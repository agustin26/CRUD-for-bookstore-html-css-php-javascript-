<?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
      die("Problemas con la conexión a la base de datos");
    
     $mysql->query("INSERT INTO stock (CODIGO_STOCK ,fecha_entrada,cantidad)
     VALUES ($_REQUEST[codigo],'$_REQUEST[fecha]',$_REQUEST[cantidad]);") or die($mysql->error);
      

    $mysql->close();

    header('Location:sotckInicio.php');  
?>  