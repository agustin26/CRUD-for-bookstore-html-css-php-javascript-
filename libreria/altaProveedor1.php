<!doctype html>
<html>
<head>
<link rel="stylesheet" href="index.css">
  <title>Alta Rubro</title>
</head>  
<body>
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div> 
  <form method="post" class="box" action="altaProveedor2.php">
    <H1>NUEVO PROVEEDOR</H1>
  <label for="codigo"> Nuevo codigo Proveedor</label>
   <input type="text" name="codigo" required>
   <br>
  <label for="nombre">Proveedor</label>
  <input type="text" name="nombre" required>
  <br>
  <label for="telefono">Telefono</label>
  <input type="tel" name="telefono" required>
  <br>
  <label for="direccion">Direccion</label>
  <input type="text" name="direccion" required>
  <br>
  <input type="submit" value="confirmar">
  </form>
</body>
</html>