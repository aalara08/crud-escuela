<?php
include("../db.php");

$clave = intval($_GET['clave']);
$sql = "DELETE FROM productos WHERE clave=$clave";

if ($conexion->query($sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $conexion->error;
}
?>
