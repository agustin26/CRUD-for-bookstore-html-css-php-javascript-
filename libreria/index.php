<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
    <title>articulos</title>
</head>

<body>
<div class="container">
        <div class="navbar">
        <a href="index.php"><img  title="inicio" src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        

        <ul>
        <li><a href="clientesInicio.php">Clientes</a></li>
            <li><a href="carrito/index.php">Ventas</a></li>
            <li><a href="tipoInicio.php">Rubro</a></li>
            <li><a href="proveedorInicio.php">Proveedor</a></li>
            <li><a href="sotckInicio.php">Stock</a></li>
        </ul>

        </div>

    </div>

    
    <?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if (mysqli_connect_error())
        die("problemas con la conexion a la base de datos");
    $registros = mysqli_query($mysql, "select product.CODIGO_PRODUCTO as codigoart,
                                     product.descripcion as descripcionart,precio,
                                     product.STOCK_CODIGO_STOCK as idstock,
                                     tipo.nombre as nombretipo,
                                     tipo.marca as marca,
                                     pro.nombre_proveedor as nombreproveedor
                                     from productos as product
                                     join tipo_producto as tipo on tipo.CODIGO_TIPO_PRODUCTO=product.tipo_producto
                                     join proveedor as pro on pro.CODIGO_PROVEEDOR=product.PROVEEDOR_CODIGO_PROVEEDOR ") or
        die("ERROR EN EL SELECT" . $mysql->error);
    echo '<table class="tablalistado">';
    echo '<tr><th>Código</th><th>Descripción</th><th>Precio</th> 
    <th>Rubro</th><th>Marca</th><th>Proveedor</th><th>ID Stock</th><th>Borrar</th><th>Modificar</th></tr>';
    while($reg=mysqli_fetch_array($registros)) 
    {
        echo '<tr>';
        echo '<td>';
        echo $reg['codigoart'];
        echo '</td>';      
        echo '<td>';
        echo $reg['descripcionart'];      
        echo '</td>';      
        echo '<td>';
        echo"$". $reg['precio'];      
        echo '</td>';      
        echo '<td>';
        echo $reg['nombretipo'];      
        echo '</td>';
        echo '<td>';
        echo $reg['marca'];      
        echo '</td>';
        echo '<td>';
        echo $reg['nombreproveedor'];      
        echo '</td>';
        echo '<td>';
        echo $reg['idstock'];      
        echo '</td>';
        echo '<td>';
        echo '<a class="boton" href="bajaarticulo.php?codigo='.$reg['codigoart'].'">Borrar</a>';
        echo '</td>';
        echo '<td>';
        echo '<a class="boton" href="modificacionarticulo1.php?codigo='.$reg['codigoart'].'">Modificar</a>';
        echo '</td>';      
        echo '</tr>';      
      }    
      echo '<tr><td colspan="9">';
      echo '<a class="boton" href="altaarticulo1.php">Agrega un nuevo artículo</a>';
      echo '</td></tr>';
      echo '</table>';
      
      $mysql->close();
    ?>
</body>

</html>