<?php
session_start();

$nombre = $_POST["nombre"];
$descripcion= $_POST["descripcion"]; 
$imagen= $_POST["imagen"]; 
$precio= $_POST["precio"];
$cantidad= $_POST["cantidad"]; 
$usuario_id= $_SESSION["usuario"]["id"];
$categoria_id= $_POST["categoria_id"];

$publicacion = new Publicacion();
$publicacion->GuardarPublicacion($nombre, $descripcion, $imagen, $precio, $cantidad, $usuario_id, $categoria_id);

header("Location ");

exit();
