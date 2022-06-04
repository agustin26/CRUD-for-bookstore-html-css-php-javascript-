<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
    <title>Ciudad</title>
</head>
<body>
<div class="container">
        <div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        

        <ul>
            <li><a href="clientesInicio.php">Clientes</a></li>
            <li><a href="index.php">Productos</a></li>
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
    $registros = mysqli_query($mysql, "select ciu.nombre_ciudad as ciuNombre,
                                        ciu.CODIGO_CIUDAD as codCiudad
                                        from  ciudad as ciu ") 
                                        or die("ERROR EN EL SELECT" . $mysql->error);

    echo '<table class="tablalistado">';
    echo '<tr><th>Código</th><th>Ciudad</th><th>Borrar</th><th>Modificar</th></tr>';
    while($reg=mysqli_fetch_array($registros)) 
    {
        echo '<tr>';
        echo '<td>';
        echo $reg['codCiudad'];
        echo '</td>';      
        echo '<td>';
        echo $reg['ciuNombre'];      
        echo '</td>';      
    
        echo '<td>';
        echo '<a class="boton" href="bajaCiudad.php?codigo='.$reg['codCiudad'].'">Borrar</a>';
        echo '</td>';
        echo '<td>';
        echo '<a class="boton" href="modificacionCiudad1.php?codigo='.$reg['codCiudad'].'">Modificar</a>';
        echo '</td>';      
        echo '</tr>';      
      }    
      echo '<tr><td colspan="9">';
      echo '<a class="boton" href="altaCiudad1.php">Agrega una nueva ciudad</a>';
      echo '</td></tr>';
      echo '</table>';
      
      $mysql->close();

?>
</body>
</html>