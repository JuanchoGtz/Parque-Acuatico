<?php
session_start();
include '../config/database.php';


// Contar usuarios
$stmt = $conn->query("SELECT COUNT(*) FROM Usuarios");
$totalUsuarios = $stmt->fetchColumn();

// Contar productos
$stmt = $conn->query("SELECT COUNT(*) FROM Productos");
$totalProductos = $stmt->fetchColumn();

// Contar ventas
$stmt = $conn->query("SELECT COUNT(*) FROM Ventas");
$totalVentas = $stmt->fetchColumn();

// Contar reservaciones
$stmt = $conn->query("SELECT COUNT(*) FROM Reservaciones");
$totalReservaciones = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: "Roboto", sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .dashboard {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            width: 80%;
            max-width: 900px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            color: #1d6cd8;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: white;
            background: #1d6cd8;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .card a:hover {
            background: #155bb5;
        }

        .logout {
            margin-top: 20px;
            text-decoration: none;
            font-weight: bold;
            color: #d9534f;
            border: 1px solid #d9534f;
            padding: 8px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        .logout:hover {
            background: #d9534f;
            color: white;
        }
    </style>
</head>
<body>

    <h1>📊 Panel de Administrador</h1>

    <div class="dashboard">
        <div class="card">
            <h3>Usuarios Registrados</h3>
            <p><?= $totalUsuarios ?></p>
            <a href="usuarios.php">Ver Detalles</a>
        </div>

        <div class="card">
            <h3>Productos</h3>
            <p><?= $totalProductos ?></p>
            <a href="productos.php">Gestionar</a>
        </div>

        <div class="card">
            <h3>Ventas</h3>
            <p><?= $totalVentas ?></p>
            <a href="ventas.php">Ver Ventas</a>
        </div>
    </div>

    <a class="logout" href="../views/login.php">🚪 Cerrar Sesión</a>

</body>
</html>
