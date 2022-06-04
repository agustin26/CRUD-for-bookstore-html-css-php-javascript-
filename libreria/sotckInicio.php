<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
    <title>Stock</title>
</head>

<body>
<div class="container">
        <div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        

        <ul>
            <li><a href="index.php">Productos</a></li>
            <li><a href="clientesInicio.php">Clientes</a></li>
            <li><a href="carrito/index.php">Ventas</a></li>
            <li><a href="tipoInicio.php">Rubro</a></li>
            <li><a href="proveedorInicio.php">Proveedor</a></li>
        </ul>

        </div>

    </div>
    <?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
        die("problemas con la conexion a la base de datos");
    $registros = mysqli_query($mysql, "select stock.CODIGO_STOCK as codigostock,
                                        stock.fecha_entrada as entrada,
                                        stock.cantidad as cantidad
                                        from stock as stock") or
        die("ERROR EN EL SELECT" . $mysql->error);
    echo '<table class="tablalistado">';
    echo '<tr><th>Código</th><th>Fecha de entrada</th><th>Cantidad</th> 
    <th>Borrar</th><th>Modificar</th></tr>';
    while($reg=mysqli_fetch_array($registros)) 
    {
        echo '<tr>';
        echo '<td>';
        echo $reg['codigostock'];
        echo '</td>';      
        echo '<td>';
        echo $reg['entrada'];      
        echo '</td>';      
        echo '<td>';
        echo $reg['cantidad'];      
        echo '</td>';      
       
        echo '<td>';
        echo '<a class="boton" href="bajaSotck.php?codigo='.$reg['codigostock'].'">Borrar</a>';
        echo '</td>';
        echo '<td>';
        echo '<a class="boton" href="modificacionStock1.php?codigo='.$reg['codigostock'].'">Modificar</a>';
        echo '</td>';      
        echo '</tr>';   
    }    
      echo '<tr><td colspan="9">';
      echo '<a class="boton" href="altaStock1.php">Agrega un nuevo producto</a>';
      echo '</td></tr>';
      echo '</table>';
      
      $mysql->close();
    ?>
</body>

</html>