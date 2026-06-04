<?php

// Conexión
$conexion = mysqli_connect("localhost", "root", "", "oficina");

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta
$sql = "SELECT * FROM clientes";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta falló
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

?>