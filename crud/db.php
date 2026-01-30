<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
