<?php include("../db.php"); ?>

<?php
$clave = $_GET['clave'];
$resultado = $conexion->query("SELECT * FROM productos WHERE clave=$clave");
$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>

<h1>Editar Producto</h1>

<form method="POST">
<input type="hidden" name="clave" value="<?php echo $producto['clave']; ?>">

Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br><br>
Precio: <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>"><br><br>
Existencias: <input type="number" name="existencias" value="<?php echo $producto['existencias']; ?>"><br><br>
Fecha caducidad: <input type="date" name="fecha_caducidad" value="<?php echo $producto['fecha_caducidad']; ?>"><br><br>
Descripción:<br>
<textarea name="descripcion"><?php echo $producto['descripcion']; ?></textarea><br><br>

<button type="submit" name="actualizar">Actualizar</button>
</form>

<?php
if (isset($_POST['actualizar'])) {
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];
    $fecha = $_POST['fecha_caducidad'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE productos SET 
            nombre='$nombre',
            precio='$precio',
            existencias='$existencias',
            fecha_caducidad=".($fecha ? "'$fecha'" : "NULL").",
            descripcion='$descripcion'
            WHERE clave=$clave";

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
