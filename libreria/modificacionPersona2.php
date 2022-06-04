<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if(mysqli_connect_error())
 die("Problema con la conexion a la base de datos");

 $mysql->query("UPDATE persona set 
                        nombre='$_REQUEST[nombre]',
                        apellido='$_REQUEST[apellido]',
                        telefono='$_REQUEST[telefono]',
                        correo='$_REQUEST[correo]',
                        empleado='$_REQUEST[empleado]',
                        CIUDAD_CODIGO_CIUDAD='$_REQUEST[ciudad]'
                        where CODIGO_CLIENTE=$_REQUEST[codigo]") or 
    die($mysql->error);
    $mysql->close();
    header('location:clientesInicio.php')
    ?>