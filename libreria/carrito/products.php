<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="icon" href="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" type="image/png">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Productos</h1>
			<a href="./cart.php" class="btn btn-warning">Ver Carrito</a>
			<a href="../../libreria/index.php" class="btn btn-warning">Inicio</a>
			<a href="detalle_venta.php" class="btn btn-warning">Detalle de ventas</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
//$products = $con->query("select * from productos");//PRODUCTOS
$products = $con->query("select produc.CODIGO_PRODUCTO ,produc.descripcion,produc.precio,produc.tipo_producto ,
						tipo.CODIGO_TIPO_PRODUCTO as codigoTipo, tipo.nombre as nombre, tipo.marca as marca
						 from productos as produc
						 join tipo_producto as tipo on tipo.CODIGO_TIPO_PRODUCTO=produc.tipo_producto");
?>
<table class="table table-bordered">
<thead>
	<th>Producto</th>
	<th>Descripción</th>
	<th>Marca</th>
	<th>Precio</th>
	<th>Carrito</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
<tr>
	<td><?php echo $r->nombre;?></td>
	<td><?php echo $r->descripcion;?></td><!--se pondria las columnas de producto,los trata como objetos-->
	<td><?php echo $r->marca;?></td>
	<td>$ <?php echo $r->precio; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;
	
	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c['product_id']==$r->CODIGO_PRODUCTO){ $found=true; break; }}}
	?>
	<?php if($found):?>
		<a href="cart.php" class="btn btn-info">Agregado</a>
	<?php else:?>
	<form class="form-inline" method="post" action="./php/addtocart.php">
	<input type="hidden" name="product_id" value="<?php echo $r->CODIGO_PRODUCTO ; ?>">
	  <div class="form-group">
	    <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
	  </div>
	  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
	</form>	
	<?php endif; ?>
	</td>
</tr>
<?php endwhile; ?>
</table>
<br><br><hr>


		</div>
	</div>
</div>
</body>
</html>