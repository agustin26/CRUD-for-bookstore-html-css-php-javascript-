<!doctype html>
<html>
<head>
<link rel="stylesheet" href="index.css">
  <title>Alta de artículo</title>
</head>  
<body>
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div> 

  <form method="post" class="box" action="altaarticulo2.php">
    <h1>NUEVO PRODUCTO</h1>
  <label for="descripcion">Ingrese descripcion del artículo</label>
  <input type="text" name="descripcion" required>
  <br>
  <label for="precio">Ingrese precio</label>
  <input type="text" name="precio" required>
  <br>
  <label for="proveedor">Seleccione proveedor</label>
  <select name="proveedor" id="proveedor">
  <?php
     $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select CODIGO_PROVEEDOR,nombre_proveedor from proveedor") or
      die($mysql->error);
    while ($reg=$registros->fetch_array())
    {
        echo "<option value='\"".$reg['CODIGO_PROVEEDOR']."\"'>".$reg['nombre_proveedor']."</option>";
    }        
  ?>  
  </select>
  <br>
  <label for="codigoStock">Seleccione el codigo stock</label>
  <select name="codigoStock" id="">
  <?php
     $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select CODIGO_STOCK from stock") or
      die($mysql->error);
    while ($reg=$registros->fetch_array())
    {
        echo "<option value='\"".$reg['CODIGO_STOCK']."\"'>".$reg['CODIGO_STOCK']."</option>";
    }        
  ?>  
  </select>
  <br>
  <label for="codigotipo">Seleccione el tipo del producto</label>
  <select name="codigotipo">
  <?php
     $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select CODIGO_TIPO_PRODUCTO,nombre,marca from tipo_producto") or
      die($mysql->error);
    while ($reg=$registros->fetch_array())
    {
        echo "<option value='\"".$reg['CODIGO_TIPO_PRODUCTO']."\"'>".$reg['nombre']."  ".$reg['marca']."</option>";
    }        
  ?>  
  </select>
  <br>
  <input type="submit"  value="confirmar">
  </form>

</body>
</html>