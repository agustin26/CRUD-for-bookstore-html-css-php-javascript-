<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">

    <title>Clientes/Empleados</title>
</head>
<body>
<div class="container">
        <div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
            
        <ul>
            <li><a href="CiudadInicio.php">Ciudades</a></li>
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
    $registros = mysqli_query($mysql, "select perso.CODIGO_CLIENTE as codigoPerso,
    	                                perso.nombre as nombre,
        	                            perso.apellido as apellido,
                                        perso.telefono as telefono,	
                                        perso.correo as correo,
                                        perso.empleado as empleado,
                                        perso.CIUDAD_CODIGO_CIUDAD as codigoCiudad,
                                        ciu.nombre_ciudad as ciuNombre,
                                        ciu.CODIGO_CIUDAD as codCiudad
                                        from persona as perso
                                        join ciudad as ciu on ciu.CODIGO_CIUDAD	=perso.CIUDAD_CODIGO_CIUDAD") 
                                        or die("ERROR EN EL SELECT" . $mysql->error);

    echo '<table class="tablalistado">';
    echo '<tr><th>Código</th><th>Nombre</th><th>Apellido</th> 
    <th>Telefono</th><th>Correo</th><th>Empleado</th><th>Ciudad</th><th>Borrar</th><th>Modificar</th></tr>';
    while($reg=mysqli_fetch_array($registros)) 
    {
        echo '<tr>';
        echo '<td>';
        echo $reg['codigoPerso'];
        echo '</td>';      
        echo '<td>';
        echo $reg['nombre'];      
        echo '</td>';      
        echo '<td>';
        echo $reg['apellido'];      
        echo '</td>';      
        echo '<td>';
        echo $reg['telefono'];      
        echo '</td>';
        echo '<td>';
        echo $reg['correo'];      
        echo '</td>';
        echo '<td>';
        echo $reg['empleado'];      
        echo '</td>';
        echo '<td>';
        echo $reg['ciuNombre'];      
        echo '</td>';
        echo '<td>';
        echo '<a class="boton" href="bajapersona.php?codigo='.$reg['codigoPerso'].'">Borrar</a>';
        echo '</td>';
        echo '<td>';
        echo '<a class="boton" href="modificacionpersona1.php?codigo='.$reg['codigoPerso'].'">Modificar</a>';
        echo '</td>';      
        echo '</tr>';      
      }    
      echo '<tr><td colspan="9">';
      echo '<a class="boton" href="altaPersona1.php">Agrega un nuevo Cliente/Empleado</a>';
      echo '</td></tr>';
      echo '</table>';
      
      $mysql->close();

?>
</body>
</html>