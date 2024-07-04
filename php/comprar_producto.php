<?php
session_start();

$publicacion_id = $_POST["publicacion_id"];
$usuario_id = $_SESSION["usuario"]["id"];
$estado = "comprado";
$cantidad = $_POST["cantidad"];


$compra = new Compra();
$compra->GuardarCompra($publicacion_id, $usuario_id, $estado, 1);

$publicacion = new Publicacion();
$publicacion->ActualizarCantidad($publicacion_id, $cantidad-1);

header("Location ");

exit();
