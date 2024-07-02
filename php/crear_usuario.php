<?php 

$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$correo=$_POST["correo"];
$contrasena=hash('sha256', $_POST["contrasena"]);

$usuario = new Usuario();
$usuario->GuardarUsuario($nombres,$apellidos,$correo,$contrasena);

header("Location ");

exit();
