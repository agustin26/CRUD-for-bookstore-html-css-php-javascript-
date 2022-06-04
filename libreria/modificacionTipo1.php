<!doctype html>
<html>
<head>
<link rel="stylesheet" href="form.css">
<link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
  <title>Modificación de Rubro</title>
</head>  
<body>
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div>  
  <?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select CODIGO_TIPO_PRODUCTO ,
                                    nombre,
                                    marca
                                    from tipo_producto where CODIGO_TIPO_PRODUCTO=$_REQUEST[codigo]") or
      die($mysql->error);
     
    if ($reg=$registro->fetch_array())
    {
  ?>
  <div class="container">
    <form method="post" action="modificacionTipo2.php">
      <h1>MODIFICACION RUBRO</h1>
      <div class="tbox">
        <label for="codigoTipo">Codigo tipo prodcuto</label>
        <input type="text" name="codigoTipo" value="<?php echo $reg['CODIGO_TIPO_PRODUCTO']; ?>">
      </div>

      <div class="tbox">
        <label for="nombreTipo">Nombre</label>
        <input type="text" name="nombreTipo"  value="<?php echo $reg['nombre']; ?>">      
      </div>

      <div class="tbox">
        <label for="marcaTipo">Marca</label>
        <input type="text" name="marcaTipo"  value="<?php echo $reg['marca']; ?>"> 
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
      echo 'No existe una ciudad con dicho código';
    
    $mysql->close();

  ?>  
</body>
</html>