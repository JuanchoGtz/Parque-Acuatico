<?php
session_start();
include '../config/database.php';

if (!isset($_GET['codigo'])) {
    die("Código de compra no proporcionado.");
}

$codigo_unico = $_GET['codigo'];

// Obtener información de la venta
$stmt = $conn->prepare("SELECT * FROM Ventas WHERE codigo_unico = ?");
$stmt->execute([$codigo_unico]);
$venta = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$venta) {
    die("Venta no encontrada.");
}

// Obtener detalles de la venta
$stmt = $conn->prepare("
    SELECT dv.*, p.nombre AS producto_nombre, e.tipo AS entrada_tipo 
    FROM Detalle_Venta dv
    LEFT JOIN Productos p ON dv.producto_id = p.id
    LEFT JOIN Entradas e ON dv.entrada_id = e.id
    WHERE dv.venta_id = ?
");
$stmt->execute([$venta['id']]);
$detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="ticket">
        <h2>🎟️ Ticket de Compra</h2>
        <p><strong>Código de compra:</strong> <?= $venta['codigo_unico'] ?></p>
        <p><strong>Fecha:</strong> <?= $venta['fecha'] ?></p>
        <hr>

        <h3>Detalles de la compra</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                    <tr>
                        <td>
                            <?= $detalle['producto_nombre'] ?: $detalle['entrada_tipo'] ?>
                        </td>
                        <td><?= $detalle['cantidad'] ?></td>
                        <td>$<?= number_format($detalle['subtotal'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <h3>Total: $<?= number_format($venta['total'], 2) ?></h3>

        <button onclick="window.print()">🖨️ Imprimir Ticket</button>
        <a href="../public/index.php">🏠 Volver al Inicio</a>
    </div>
</body>
</html>
