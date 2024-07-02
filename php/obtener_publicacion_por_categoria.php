<?php

$categoria_id = $_POST["categoria_id"];

$publicacion_por_categoria = new Publicacion();
$publicacion_por_categoria_id->ObtenerPublicacionesPorCategoria($categoria_id);

header("Location ");

exit();
