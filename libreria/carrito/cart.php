<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
$acumulador=0;
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
				<h1>Carrito</h1>
				<a href="./products.php" class="btn btn-default">Productos</a>
				<a href="../../libreria/index.php" class="btn btn-warning">Inicio</a>
				<a href="detalle_venta.php" class="btn btn-warning">Detalle de ventas</a>
				<br><br>
				<?php
				/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
				$products = $con->query("select * from productos");/*productos*/
				if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) :/*si existe y es distinto a vacio*/
				?>
					<table class="table table-bordered">
						<thead>
							<th>Cantidad</th>
							<th>Producto</th>
							<th>Descripción</th>
							<th>Marca</th>
							<th>Precio Unitario</th>
							<th>Total</th>
							<th></th>
						</thead>
						<?php
						/*
*  hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
						foreach ($_SESSION["cart"] as $c) :
							$products = $con->query("select produc.CODIGO_PRODUCTO as codprod ,produc.descripcion,produc.precio,produc.tipo_producto ,
tipo.CODIGO_TIPO_PRODUCTO  as codigoTipo,tipo.nombre, tipo.marca as marca from tipo_producto as tipo 
 join productos as produc on produc.CODIGO_PRODUCTO =$c[product_id] where tipo.CODIGO_TIPO_PRODUCTO =produc.tipo_producto");
							$r = $products->fetch_object();
						?>
							<tr>
								<th><?php echo $c["q"]; ?></th>
								<td><?php echo $r->nombre; ?></td>
								<td><?php echo $r->descripcion; ?></td>
								<td><?php echo $r->marca; ?></td>
								<td>$ <?php echo $r->precio; ?></td>
								<td>$ <?php echo $c["q"] * $r->precio; ?></td><!-- imprime el precio por la cantidad-->
								<td style="width:260px;">

									<?php
									$found = false;
									foreach ($_SESSION["cart"] as $c) {
										if ($c["product_id"] == $r->codprod) {
											$found = true;
											break;
										}
									}
									?>
									<a href="php/delfromcart.php?id=<?php echo $c["product_id"]; ?>" class="btn btn-danger">Eliminar</a>
								</td>
							</tr>
							<?php $acumulador += $c["q"] * $r->precio; ?>
						<?php endforeach; ?>
						<tr>
							<td>Suma Total</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo "$". $acumulador ?></td>
						</tr>
					</table>

					<form class="form-horizontal" method="post" action="./php/process.php">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Telefono del cliente</label>
							<div class="col-sm-5">
								<input type="tel" name="tel"  class="form-control" id="inputEmail3" placeholder="Telefono del cliente">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Procesar Venta</button>
							</div>
						</div>
					</form>


				<?php else : ?>
					<p class="alert alert-warning">El carrito esta vacio.</p>
				<?php endif; ?>
				<br><br>
				<hr>


			</div>
		</div>
	</div>
</body>

</html>