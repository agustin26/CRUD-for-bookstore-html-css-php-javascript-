<?php
$mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
if(mysqli_connect_error())
 die("Problema con la conexion a la base de datos");

 $mysql->query("UPDATE stock set 
                        CODIGO_STOCK ='$_REQUEST[codigoStock]',
                        fecha_entrada='$_REQUEST[entrada]',
                        cantidad='$_REQUEST[cantidad]'
                    
                        where CODIGO_STOCK=$_REQUEST[codigo]") or 
    die($mysql->error);
    $mysql->close();
    header('location:sotckInicio.php')
?>