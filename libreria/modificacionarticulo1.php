<!doctype html>
<html>
<head>
<link rel="stylesheet" href="form.css">
<link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
  <title>Modificación de artículo.</title>
</head>  
<body>
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div>  
  <?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select descripcion,
                                       precio,
                                       tipo_producto,
                                       PROVEEDOR_CODIGO_PROVEEDOR ,
                                       STOCK_CODIGO_STOCK
                                    from productos where CODIGO_PRODUCTO=$_REQUEST[codigo]") or
      die($mysql->error);
     
    if ($reg=$registro->fetch_array())
    {
  ?>
  <div class="container">
    <form method="post" action="modificacionarticulo2.php">
      <h1>MODIFICACION  ARTICULO</h1>
      <div class="tbox">
        <label for="descripcion">Descripción del artículo:</label>
        <input type="text" name="descripcion" size="50" value="<?php echo $reg['descripcion']; ?>">
      </div>
      <br>
      <div class="tbox">
        <label for="precio">Precio:</label>
        <input type="text" name="precio" size="10" value="<?php echo $reg['precio']; ?>"> 
      </div>     
      <br>  
       <!------
      --> 
        <label for="CODIGO_TIPO_PRODUCTO">Tipo de producto:</label>
    

      <div class="content-select"> 
        <select name="CODIGO_TIPO_PRODUCTO">
        <?php
        $registros2=$mysql->query("select CODIGO_TIPO_PRODUCTO,nombre,marca from tipo_producto ") or
          die($mysql->error);
        while ($reg2=$registros2->fetch_array())
        {
          if ($reg2['CODIGO_TIPO_PRODUCTO']==$reg['tipo_producto'])
            echo "<option value=".$reg2['CODIGO_TIPO_PRODUCTO']." selected>".$reg2['nombre']."  ".$reg2['marca']."</option>";
            //las barras despues del value se pueden sacar y funciona de la misma forma
          else
            echo "<option value=\"".$reg2['CODIGO_TIPO_PRODUCTO']."\">".$reg2['nombre']."  ".$reg2['marca']."</option>";
        }        
        ?>  
        </select> 
        <i></i> 
      </div>   
      
      
      <label for="codigoProveedor"> Proveedor:</label>  
      <div class="content-select"> 
        <select name="codigoProveedor">
        <?php
        $registros3=$mysql->query("select prov.CODIGO_PROVEEDOR,prov.nombre_proveedor from proveedor as prov ") or
          die($mysql->error);
        while ($reg3=$registros3->fetch_array())
        {
          if ($reg3['CODIGO_PROVEEDOR']==$reg['PROVEEDOR_CODIGO_PROVEEDOR'])
            echo "<option value=".$reg3['CODIGO_PROVEEDOR']." selected>".$reg3['nombre_proveedor']."</option>";
            //las barras despues del value se pueden sacar y funciona de la misma forma
          else
            echo "<option value=\"".$reg3['CODIGO_PROVEEDOR']."\">".$reg3['nombre_proveedor']."</option>";
        }        
        ?>  
        </select>  
        <i></i>
      </div>  
     
                 
      
    <input type="hidden" name="codigo" value="<?php echo $_REQUEST['codigo']; ?>">     
      <br> 
      <input type="submit" class="btn" value="Confirmar">
    </form>
  </div>
  <?php
    }      
    else
      echo 'No existe un artículo con dicho código';
    
    $mysql->close();

  ?>  
</body>
</html>