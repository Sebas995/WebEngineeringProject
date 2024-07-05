<?php

require_once("../DB/compra.php");

$compra = new Compra();
$compra->ObtenerComprasPorUsuario($_SESSION["usuario"]["id"]);

header("Location: ../paginas/compras.php");

exit();
