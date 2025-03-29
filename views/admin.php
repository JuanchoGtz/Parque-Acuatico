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
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Panel de Administrador</h1>
    
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

    <a href="../views/login.php">Cerrar Sesión</a>
</body>
</html>
