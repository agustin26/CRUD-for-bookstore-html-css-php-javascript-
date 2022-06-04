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
  <form method="post" class="box" action="altaStock2.php">
    <h1>ALTA STOCK</h1>
   <label for="codigo"> Nuevo codigo Stock</label>
   <input type="text" name="codigo" required>
   <br>
  <label for="fecha">Fecha entrada</label>
  <input type="date" name="fecha" required>
  <br>
  <label for="cantidad">Cantidad</label>
  <input type="text" name="cantidad" required>
  <br>
  <input type="submit" value="confirmar">
  </form>
</body>
</html>