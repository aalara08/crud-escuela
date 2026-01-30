<?php include("../db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
</head>
<body>

<h1>Agregar Producto</h1>

<form method="POST">
    Clave: <input type="number" name="clave" required><br><br>
    Nombre: <input type="text" name="nombre" required><br><br>
    Precio: <input type="number" step="0.01" name="precio" required><br><br>
    Existencias: <input type="number" name="existencias" required><br><br>
    Fecha de caducidad: <input type="date" name="fecha_caducidad"><br><br>
    Descripción:<br>
    <textarea name="descripcion"></textarea><br><br>

    <button type="submit" name="guardar">Guardar</button>
</form>

<?php
if (isset($_POST['guardar'])) {
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];
    $fecha = $_POST['fecha_caducidad'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO productos 
            (clave, nombre, precio, existencias, fecha_caducidad, descripcion)
            VALUES ('$clave','$nombre','$precio','$existencias',
                    ".($fecha ? "'$fecha'" : "NULL").",
                    '$descripcion')";

    if ($conexion->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
</body>
</html>
