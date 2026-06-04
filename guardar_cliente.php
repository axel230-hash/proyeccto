<?php

$conexion = new mysqli("localhost", "root", "", "oficina");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$nombre = $_POST['nombre'];
$departamento = $_POST['departamento'];
$descripcion = $_POST['descripcion'];
$tipo_problema = $_POST['tipo_problema'];

$sql = "INSERT INTO clientes(nombre, departamento, descripcion, tipo_problema)
VALUES ('$nombre', '$departamento', '$descripcion', '$tipo_problema')";

if ($conexion->query($sql) === TRUE) {

     
    $id_generado = $conexion->insert_id;

     
    header("Location: plantilla.php?ok=1&id=$id_generado");
    exit;

} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();

?>