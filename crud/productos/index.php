<?php include("../db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Productos</title>
</head>
<body>

<h1>Lista de Productos</h1>

<a href="create.php">Agregar Producto</a><br><br>

<table border="1" cellpadding="8">
<tr>
    <th>Clave</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Existencias</th>
    <th>Caducidad</th>
    <th>Descripción</th>
    <th>Acciones</th>
</tr>

<?php
$resultado = $conexion->query("SELECT * FROM productos");

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$fila['clave']}</td>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>$ {$fila['precio']}</td>";
    echo "<td>{$fila['existencias']}</td>";
    echo "<td>{$fila['fecha_caducidad']}</td>";
    echo "<td>{$fila['descripcion']}</td>";
    echo "<td>
            <a href='update.php?clave={$fila['clave']}'>Editar</a> |
            <a href='delete.php?clave={$fila['clave']}'>Eliminar</a>
          </td>";
    echo "</tr>";
}
?>
</table>

</body>
</html>
