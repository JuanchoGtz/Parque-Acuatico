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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: "Roboto", sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        h1 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .search-container {
            width: 100%;
            max-width: 500px;
            margin-bottom: 20px;
        }

        .search-container input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .ventas-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .venta-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .venta-card:hover {
            transform: scale(1.05);
        }

        .venta-card h3 {
            color: #1d6cd8;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .venta-card p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .venta-card .total {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }

        .back-button {
            margin-top: 20px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            background: #1d6cd8;
            padding: 8px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        .back-button:hover {
            background: #155bb5;
        }
    </style>
</head>
<body>

    <h1>📜 Historial de Ventas</h1>

    <div class="search-container">
        <input type="text" id="search" placeholder="🔍 Buscar por cliente o código de compra...">
    </div>

    <div class="ventas-container">
        <?php foreach ($ventas as $venta): ?>
            <div class="venta-card" data-search="<?= strtolower($venta['cliente'] . ' ' . $venta['codigo_unico']) ?>">
                <h3>🛒 Venta #<?= $venta['id'] ?></h3>
                <p><strong>Cliente:</strong> <?= $venta['cliente'] ?></p>
                <p><strong>Código:</strong> <?= $venta['codigo_unico'] ?></p>
                <p class="total"><strong>Total:</strong> $<?= number_format($venta['total'], 2) ?></p>
                <p><strong>Fecha:</strong> <?= $venta['fecha'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="back-button" href="admin.php">⬅️ Volver</a>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".venta-card").filter(function() {
                    $(this).toggle($(this).attr("data-search").indexOf(value) > -1);
                });
            });
        });
    </script>

</body>
</html>

