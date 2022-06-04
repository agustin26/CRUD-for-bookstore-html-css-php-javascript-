<!doctype html>
<html>
<head>
<link rel="stylesheet" href="form.css">
<link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
  <title>Modificación Clientes/Empleados</title>
</head>  
<body>
<div class="navbar">
        <a href="index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" class="logo" alt="INICIO"></a>
        
</div>  
  <?php
    $mysql = new mysqli("localhost", "agustin", "2612agustinlepori", "mydb");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("SELECT CODIGO_CLIENTE,
    	                            nombre,
                                    apellido,
                                    telefono,
                                    correo,
                                    empleado,
                                    CIUDAD_CODIGO_CIUDAD
                                    from persona where CODIGO_CLIENTE =$_REQUEST[codigo]") or
      die($mysql->error);
     
    if ($reg=$registro->fetch_array())
    {
  ?>
  <div class="container">
    <form method="post" action="modificacionPersona2.php">
      <h1>MODIFICACION CLIENTE</h1>
      <div class="tbox">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" size="50" value="<?php echo $reg['nombre']; ?>">
      </div>
      
      <div class="tbox">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" size="10" value="<?php echo $reg['apellido']; ?>"> 
      </div>     
        
       <!------
      -->  
      <div class="tbox"> 
        <label for="telefono">Telefono:</label>
        <input type="tel" name="telefono" value="<?php echo $reg['telefono']; ?>">
      </div>     
      
      <div class="tbox"> 
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $reg['correo']; ?>"> 
      </div>
      
      <div class="tbox"> 
        <label for="empleado">Empleado:</label>
        <input type="numer" min="0" max="1" name="empleado"  value="<?php echo $reg['empleado']; ?>">
      </div>
      
      
        <label for="ciudad">Ciudad</label>
      <div class="content-select">  
        <select name="ciudad">
        <?php
        $registros2=$mysql->query("select ciu.CODIGO_CIUDAD,ciu.nombre_ciudad	from ciudad as ciu") or
          die($mysql->error);
        while ($reg2=$registros2->fetch_array())
        {
          if ($reg2['CODIGO_CIUDAD']==$reg['CIUDAD_CODIGO_CIUDAD'])
            echo "<option value=".$reg2['CODIGO_CIUDAD']." selected>".$reg2['nombre_ciudad']."</option>";
            //las barras despues del value se pueden sacar y funciona de la misma forma
          else
            echo "<option value=\"".$reg2['CODIGO_CIUDAD']."\">".$reg2['nombre_ciudad']."</option>";
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
      echo 'No existe una persona con dicho código';
    
    $mysql->close();

  ?>  
</body>
</html>