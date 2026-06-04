<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "sistema_login";

$conexion = mysqli_connect($host, $usuario, $contrasena, $bd);

if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}

?>