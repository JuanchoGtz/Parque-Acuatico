<?php 
session_start();
include '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener los productos de la base de datos
$stmt = $conn->query("SELECT * FROM Productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener las entradas de la base de datos
$stmt = $conn->query("SELECT * FROM Entradas");
$entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Entradas y Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: "Roboto", sans-serif;
            background-color: #F9F9F9;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #1d6cd8;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-container, .entrada-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .product-card, .entrada-card {
            width: 200px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 10px;
        }

        .product-card img, .entrada-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 2px solid #1d6cd8;
        }

        .product-card h5, .entrada-card h5 {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }

        .product-card p, .entrada-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .btn-primary {
            background-color: #1d6cd8;
            border: none;
        }

        .btn-primary:hover {
            background-color: #155bb5;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Selecciona tus entradas y productos</h2>

    <form action="../controllers/compraController.php" method="POST">

        <!-- Sección de Entradas -->
        <h3>Entradas</h3>
        <div class="entrada-container">
            <?php foreach ($entradas as $entrada): ?>
                <div class="entrada-card">
                    <img src="../public/imgs/Alberca-Familiar.jpg" alt="Entrada">
                    <h5><?= htmlspecialchars($entrada['tipo']) ?></h5>
                    <p>Precio: $<?= number_format($entrada['precio'], 2) ?></p>
                    <input type="hidden" name="entrada_id[]" value="<?= $entrada['id'] ?>">
                    <input type="number" name="cantidad_entrada[]" value="0" min="0" class="form-control">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Sección de Productos -->
        <h3>Productos</h3>
        <div class="product-container">
            <?php foreach ($productos as $producto): ?>
                <div class="product-card">
                    <h5><?= htmlspecialchars($producto['nombre']) ?></h5>
                    <p>Precio: $<?= number_format($producto['precio'], 2) ?></p>
                    <input type="checkbox" name="productos[<?= $producto['id'] ?>]" value="<?= $producto['id'] ?>">
                    <input type="number" name="cantidad[<?= $producto['id'] ?>]" value="1" min="1" class="form-control">
                </div>
            <?php endforeach; ?>
        </div>

        <br>
        <button type="submit" class="btn btn-primary w-100">Comprar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
