<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if(mysqli_connect_error())
 die("Problema con la conexion a la base de datos");

 $mysql->query("UPDATE ciudad set 
                        CODIGO_CIUDAD ='$_REQUEST[codigoCiudad]',
                        nombre_ciudad='$_REQUEST[ciudad]'
                        where CODIGO_CIUDAD=$_REQUEST[codigo]") or 
    die($mysql->error);
    $mysql->close();
    header('location:CiudadInicio.php')
    ?>