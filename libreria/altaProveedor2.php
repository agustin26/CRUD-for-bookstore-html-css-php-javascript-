<?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
      die("Problemas con la conexión a la base de datos");
    
     $mysql->query("INSERT INTO proveedor (CODIGO_PROVEEDOR,nombre_proveedor,telefono,direccion)
     VALUES ($_REQUEST[codigo],'$_REQUEST[nombre]','$_REQUEST[telefono]','$_REQUEST[direccion]');") or die($mysql->error);
      

    $mysql->close();

    header('Location:proveedorInicio.php');  

?>  