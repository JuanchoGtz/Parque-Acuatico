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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        .productos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .producto-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .producto-card:hover {
            transform: scale(1.05);
        }

        .producto-card h3 {
            color: #1d6cd8;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .producto-card p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .producto-card .precio {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }

        .producto-card .acciones {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .btn-editar, .btn-eliminar {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-editar {
            background: #ffc107;
            color: #333;
        }

        .btn-editar:hover {
            background: #e0a800;
        }

        .btn-eliminar {
            background: #dc3545;
            color: white;
        }

        .btn-eliminar:hover {
            background: #c82333;
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

    <h1>🛒 Gestión de Productos</h1>

    <div class="productos-container">
        <?php foreach ($productos as $producto): ?>
            <div class="producto-card">
                <h3><?= $producto['nombre'] ?></h3>
                <p><?= $producto['descripcion'] ?></p>
                <p class="precio">$<?= number_format($producto['precio'], 2) ?></p>
                <p><strong>Tipo:</strong> <?= ucfirst($producto['tipo']) ?></p>
                <div class="acciones">
                    <a class="btn-editar" href="editar_producto.php?id=<?= $producto['id'] ?>">✏️ Editar</a>
                    <a class="btn-eliminar" href="../controllers/eliminar_producto.php?id=<?= $producto['id'] ?>" onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="back-button" href="admin.php">⬅️ Volver</a>

</body>
</html>
