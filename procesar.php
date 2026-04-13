<?php
$conexion = new mysqli("localhost", "root", "", "lasalle");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $stmt = $conexion->prepare("INSERT INTO contactos (nombre, correo, telefono, asunto, mensaje) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $correo, $telefono, $asunto, $mensaje);

    if ($stmt->execute()) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
