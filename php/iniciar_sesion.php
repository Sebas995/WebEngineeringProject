<?php 
session_start();

require_once("../DB/usuario.php");

if (isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
} 

$correo=$_POST["correo"];
$contrasena=hash('sha256', $_POST["contrasena"]);

$usuario = new Usuario();
$usuario->ObtenerUsuario($correo, $contrasena);

if (isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
} else {
    header("Location: ../paginas/inicio.php");
}

exit();


