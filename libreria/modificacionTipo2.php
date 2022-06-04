<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if(mysqli_connect_error())
 die("Problema con la conexion a la base de datos");

 $mysql->query("UPDATE tipo_producto set 
                        CODIGO_TIPO_PRODUCTO  ='$_REQUEST[codigoTipo]',
                        nombre='$_REQUEST[nombreTipo]',
                        marca='$_REQUEST[marcaTipo]'
                        where CODIGO_TIPO_PRODUCTO=$_REQUEST[codigo]") or 
    die($mysql->error);
    $mysql->close();
    header('location:tipoInicio.php')
    ?>