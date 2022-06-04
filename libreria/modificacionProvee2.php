<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if(mysqli_connect_error())
 die("Problema con la conexion a la base de datos");

 $mysql->query("UPDATE proveedor set 
                        CODIGO_PROVEEDOR   ='$_REQUEST[codigoProvee]',
                        nombre_proveedor='$_REQUEST[proveedor]',
                        telefono='$_REQUEST[telefono]',
                        direccion='$_REQUEST[direccion]'
                        where CODIGO_PROVEEDOR=$_REQUEST[codigo]") or 
    die($mysql->error);
    $mysql->close();
    header('location:proveedorInicio.php')
    ?>