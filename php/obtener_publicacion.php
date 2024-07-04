<?php
require_once("../DB/publicacion.php");
require_once("../DB/categoria.php");

$busqueda = $_POST["busqueda"];

$publicaciones = new Publicacion();

if ($busqueda == "juvenil" || $busqueda == "peques" || $busqueda == "clasicos") {
    $categoria = new Categoria();
    $categoria->ObtenerCategoria($busqueda);

    $publicaciones->ObtenerPublicacionesPorCategoria($_SESSION["categoria"]["id"]);

    header("Location: ../paginas/catalogo.php");

    exit();
} 

if ($busqueda != "") {
    $publicaciones->ObtenerPublicacionPorNombre($busqueda);

    header("Location: ../paginas/catalogo.php");
    
    exit();
}

$publicaciones->ObtenerPublicaciones();

header("Location: ../paginas/catalogo.php");

exit();
