<?php 
session_start();
require_once("../DB/usuario.php");

$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$correo=$_POST["correo"];
$contrasena=hash('sha256', $_POST["contrasena"]);
$contrasena2=hash('sha256', $_POST["contrasena2"]);

if ($contrasena != $contrasena2) {
    $_SESSION["contrasena_invalida"] = "Las contraseñas ingresadas no coinciden.";

    header("Location: ../paginas/registrarse.php");

    exit();
}

$usuario = new Usuario();
$usuario->GuardarUsuario($nombres,$apellidos,$correo,$contrasena);

header("Location: ../paginas/registrarse.php");

exit();
