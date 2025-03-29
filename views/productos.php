<?php
session_start();
include '../config/database.php';



// Obtener productos
$stmt = $conn->query("SELECT * FROM Productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Gestión de Productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['id'] ?></td>
                <td><?= $producto['nombre'] ?></td>
                <td><?= $producto['descripcion'] ?></td>
                <td>$<?= $producto['precio'] ?></td>
                <td><?= $producto['tipo'] ?></td>
                <td>
                    <a href="editar_producto.php?id=<?= $producto['id'] ?>">Editar</a>
                    <a href="../controllers/eliminar_producto.php?id=<?= $producto['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="admin.php">Volver</a>
</body>
</html>
