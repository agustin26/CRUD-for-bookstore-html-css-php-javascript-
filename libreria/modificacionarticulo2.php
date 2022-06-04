<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if(mysqli_connect_error())
 die("Problema con la conexion a la base de datos");

 $mysql->query("UPDATE productos set 
                        descripcion='$_REQUEST[descripcion]',
                        precio='$_REQUEST[precio]',
                        tipo_producto='$_REQUEST[CODIGO_TIPO_PRODUCTO]',
                        PROVEEDOR_CODIGO_PROVEEDOR='$_REQUEST[codigoProveedor]'
                        /*STOCK_CODIGO_STOCK='$_REQUEST[codigoStock]'*/
                        where CODIGO_PRODUCTO=$_REQUEST[codigo]") or 
    die($mysql->error);
    $mysql->close();
    header('location:index.php')
    ?>