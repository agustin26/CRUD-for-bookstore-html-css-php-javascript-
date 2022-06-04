<?php 
session_start();
include "conection.php";
if(!empty($_POST)){
$q1 = $con->query("insert into cart(client_tel,created_at) value(\"$_POST[tel]\",NOW())");
if($q1){
$cart_id = $con->insert_id;
foreach ($_SESSION["cart"] as $c){
$q2 = $con->query("insert into cart_product(product_id,q,cart_id) values('$c[product_id]','$c[q]','$cart_id')");

$stock= mysqli_query($con,"select produc.STOCK_CODIGO_STOCK,
produc.CODIGO_PRODUCTO ,
stock.CODIGO_STOCK as cods,
stock.cantidad as cantidad
from productos as produc
join stock as stock on stock.CODIGO_STOCK =produc.STOCK_CODIGO_STOCK ")or
die("ERROR EN EL SELECT" . $con->error);

while($reg=mysqli_fetch_array($stock)) 
{
    if($reg['cods']==$reg['STOCK_CODIGO_STOCK'])
    {
        
        $con->query("UPDATE stock set 
                        cantidad='$reg[cantidad]'-'$c[q]'
                        where CODIGO_STOCK =$reg[STOCK_CODIGO_STOCK] and $reg[CODIGO_PRODUCTO] =$c[product_id]") or 
    die($con->error);
    }
}
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='../products.php';</script>";
?>