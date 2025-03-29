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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: "Roboto", sans-serif;
            background-color: #F4F4F4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .ticket {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #1d6cd8;
            font-weight: bold;
        }

        hr {
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background: #1d6cd8;
            color: white;
        }

        button {
            background: #1d6cd8;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background: #155bb5;
        }

        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #1d6cd8;
            font-weight: bold;
        }

        a:hover {
            color: #155bb5;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>🎟️ Ticket de Compra</h2>
        <p><strong>Código de compra:</strong> <?= $venta['codigo_unico'] ?></p>
        <p><strong>Fecha:</strong> <?= $venta['fecha'] ?></p>
        <hr>

        <h3>Detalles de la compra</h3>
        <table>
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
                        <td><?= $detalle['producto_nombre'] ?: $detalle['entrada_tipo'] ?></td>
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

