<?php
$conexion = new mysqli("localhost", "root", "", "lasalle");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO contactos (nombre, correo, telefono, asunto, mensaje)
        VALUES ('$nombre', '$correo', '$telefono', '$asunto', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    echo "Mensaje enviado correctamente";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>