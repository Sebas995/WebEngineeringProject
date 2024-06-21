<?php

$user="root";
$pass="";
$server="localhost";
$db="ecomerse";

$mysqli = new mysqli($server, $user, $pass, $db);

if ($mysqli->connect_error) {

    echo"fallo hermano";
}
else {
    echo"funciono hermano";
}

$mysqli->close();

