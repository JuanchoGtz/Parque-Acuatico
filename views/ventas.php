<?php
session_start();
include '../config/database.php';



// Obtener ventas
$stmt = $conn->query("SELECT v.id, u.nombre AS cliente, v.codigo_unico, v.total, v.fecha 
                      FROM Ventas v 
                      JOIN Usuarios u ON v.usuario_id = u.id");
$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ventas</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Historial de Ventas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Código</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($ventas as $venta): ?>
            <tr>
                <td><?= $venta['id'] ?></td>
                <td><?= $venta['cliente'] ?></td>
                <td><?= $venta['codigo_unico'] ?></td>
                <td>$<?= $venta['total'] ?></td>
                <td><?= $venta['fecha'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="admin.php">Volver</a>
</body>
</html>
