<?php
include "php/conection.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detalle_venta.css">
    <title>Detalle de Ventas</title>
</head>

<body>
    <div class="container-nav">
        <div class="navbar">
            <a href="../index.php"><img src="kisspng-logo-bookcase-vector-graphics-image-design-5c0d15e27c7836.3717233815443614425098.png" title="inicio" alt="inicio" class="logo" ></a>


            <ul>
                <li><a href="../clientesInicio.php">Clientes</a></li>
                <li><a href="index.php">Ventas</a></li>
                <li><a href="../tipoInicio.php">Rubro</a></li>
                <li><a href="../proveedorInicio.php">Proveedor</a></li>
                <li><a href="../sotckInicio.php">Stock</a></li>
            </ul>

        </div>

    </div>

    <div class="container">
        <?php
        $detalle = $con->query("select product.CODIGO_PRODUCTO as codigoart,
            product.descripcion as descripcionart,precio,product.tipo_producto,
            cart.id,cart.created_at as fecha,cart.client_tel as cliente,
            cart_product.product_id,cart_product.q as cantidad,cart_product.cart_id,
            tipo.nombre as tipoart,tipo.marca as artmarca
            from productos as product
            join cart_product on product.CODIGO_PRODUCTO= cart_product.product_id
            join cart on cart.id=cart_product.cart_id
            join tipo_producto as tipo on product.tipo_producto=tipo.CODIGO_TIPO_PRODUCTO");
        ?>
        <?php
        while ($r = $detalle->fetch_object()) : ?>
            <div class="subapartado">

                <div class="titulo">
                    <p class="detalle">Fecha: </p>
                    <p class="titulo"><?php echo $r->fecha; ?></p>
                    <p class="detalle">Cliente:</p>
                    <p class="titulo"><?php echo $r->cliente; ?></p>
                </div>



                <div class="info">
                    <table class="tabla">
                        <tr>
                            <th>Articulo</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                        <tr>
                            <td><?php echo $r->tipoart; ?></td>
                            <td><?php echo  $r->artmarca; ?></td>
                            <td><?php echo  $r->descripcionart; ?></td>
                            <td><?php echo  $r->cantidad; ?></td>
                            <td><?php echo "$" . $r->precio*$r->cantidad ?></td>
                        </tr>
                    </table>



                </div>
            </div>
        <?php endwhile; ?>

    </div>
</body>

</html>