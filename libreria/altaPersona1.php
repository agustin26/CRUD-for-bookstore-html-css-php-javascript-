<!doctype html>
<html>
<head>
<link rel="stylesheet" href="index.css">
  <title>Alta de Cliente/Empleado</title>
</head>  
<body>
  
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div> 

  <form class="box" method="post" action="altaPersona2.php">
    <h1>ALTA</h1>
  <label for="Nombre">Nombre</label>
  <input type="text" name="Nombre" required>
  <br>
  <label for="Apellido">Apellido</label>
  <input type="text" name="Apellido" required>
  <br>
  <label for="telefono">Telefono</label>
  <input type="tel" name="telefono" require>
  <br>
  <label for="correo">Correo</label>
  <input type="email" name="correo">
  <br>
  <label for="empleado">Empleado:</label>
  <input type="number" min="0" max="1" name="empleado" require>
  <br>
  <label for="ciudad">Seleccione su Ciudad</label>
  <select name="ciudad" id="ciudad" require>
  <?php
     $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select CODIGO_CIUDAD ,nombre_ciudad from ciudad") or
      die($mysql->error);
    while ($reg=$registros->fetch_array())
    {
        echo "<option value='\"".$reg['CODIGO_CIUDAD']."\"'>".$reg['nombre_ciudad']."</option>";
    }        
  ?>  
  </select>
  <br>
  <input type="submit"  class="btn" value="confirmar">
  </form>
  
</body>
</html>