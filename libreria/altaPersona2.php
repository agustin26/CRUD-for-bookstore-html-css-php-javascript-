<?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
      die("Problemas con la conexión a la base de datos");

     $mysql->query("INSERT INTO persona (nombre,apellido,telefono, correo, empleado, CIUDAD_CODIGO_CIUDAD)
     VALUES ('$_REQUEST[Nombre]', '$_REQUEST[Apellido]', $_REQUEST[telefono], '$_REQUEST[correo]', $_REQUEST[empleado],$_REQUEST[ciudad]);") or       die($mysql->error);
      

    $mysql->close();

    header('Location:clientesInicio.php');  
   
    
?>  