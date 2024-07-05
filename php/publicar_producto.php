<?php
session_start();
require_once("../DB/publicacion.php");

$nombre = $_POST["nombre"];
$descripcion= $_POST["descripcion"]; 

$file = $_FILES["imagen"]["tmp_name"];
/*$imagen = addslashes(file_get_contents($file));*/

$fp = fopen($file, 'r+b');
$imagen = fread($fp, filesize($file));
fclose($fp);

$precio= $_POST["precio"];
$cantidad= $_POST["cantidad"]; 
$usuario_id= $_SESSION["usuario"]["id"];
$categoria_id= $_POST["categoria_id"];

$publicacion = new Publicacion();
$publicacion->GuardarPublicacion($nombre, $descripcion, $imagen, $precio, $cantidad, $usuario_id, $categoria_id);

header("Location: ../paginas/catalogo.php ");

exit();
