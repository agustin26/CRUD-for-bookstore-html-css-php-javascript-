<!doctype html>
<html>
<head>
<link rel="stylesheet" href="form.css">
<link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
  <title>Modificación Proveedor</title>
</head>  
<body>
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div>
  <?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select CODIGO_PROVEEDOR ,
                            nombre_proveedor,
                            telefono,
                            direccion
                            from proveedor where CODIGO_PROVEEDOR=$_REQUEST[codigo]") or
      die($mysql->error);
     
    if ($reg=$registro->fetch_array())
    {
  ?>
  <div class="container">
    <form method="post" action="modificacionProvee2.php">
      <h1>MODIFICACION PROVEEDOR</h1>
      <div class="tbox">
        <label for="codigoProvee">Codigo de proveedor</label>
        <input type="text" name="codigoProvee" value="<?php echo $reg['CODIGO_PROVEEDOR']; ?>">
      </div>
      <br>
      <div class="tbox">
        <label for="proveedor">Proveedor</label>
        <input type="text" name="proveedor"  value="<?php echo $reg['nombre_proveedor']; ?>"> 
      </div>     
      <br>  
      <div class="tbox">
        <label for="telefono">Telefono</label>
       <input type="tel" name="telefono"  value="<?php echo $reg['telefono']; ?>">
      </div>  
      <br>
      <div class="tbox">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion"  value="<?php echo $reg['direccion']; ?>">
      </div>  
       <!------
      -->    
             
      
    <input type="hidden" name="codigo" value="<?php echo $_REQUEST['codigo']; ?>">     
      <br> 
      <input type="submit"  class="btn" value="Confirmar">
    </form>
  </div>
  <?php
    }      
    else
      echo 'No existe un proveedor con dicho código';
    
    $mysql->close();

  ?>  
</body>
</html>