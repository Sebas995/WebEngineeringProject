<?php 

$correo=$_POST["correo"];
$contrasena=hash('sha256', $_POST["contrasena"]);

$usuario = new Usuario();
$usuario->ObtenerUsuario($correo, $contrasena);

header("Location ");

exit();


