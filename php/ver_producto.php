<?php
require_once("../DB/publicacion.php");

$id = $_GET["publicacion_id"];

$publicaciones = new Publicacion();
$publicaciones->ObtenerPublicacion($id);


header("Location: ../paginas/one.php?producto_id=$id");

exit();