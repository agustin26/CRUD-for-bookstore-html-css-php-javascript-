<?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
      die("Problemas con la conexión a la base de datos");
      $vara=$_REQUEST['codigo'];
      $varb=$_REQUEST['descripcion'];

  
     $mysql->query("INSERT INTO productos (descripcion,precio,tipo_producto, PROVEEDOR_CODIGO_PROVEEDOR, STOCK_CODIGO_STOCK)
     VALUES ('$_REQUEST[descripcion]', $_REQUEST[precio], $_REQUEST[codigotipo], $_REQUEST[proveedor], $_REQUEST[codigoStock]);") or die($mysql->error);
      

    $mysql->close();

    header('Location:index.php');  
   
    
?>  