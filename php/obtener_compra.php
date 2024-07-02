<?php

$compra_id = $_POST["compra_id"];

$obtener_compra = new Compra();

if ( $compra_id != "")  {
    $obtener_compra->ObtenerCompra($compra_id);
} else {
    $obtener_compra->ObtenerCompras();
}

header("Location ");

exit();
