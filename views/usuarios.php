<?php
session_start();
include '../config/database.php';



// Obtener lista de usuarios
$stmt = $conn->query("SELECT id, nombre, email, tipo FROM Usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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

        .usuarios-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 100%;
            max-width: 900px;
        }

        .usuario-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .usuario-card:hover {
            transform: scale(1.05);
        }

        .usuario-card h3 {
            color: #1d6cd8;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .usuario-card p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
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

    <h1>👥 Lista de Usuarios</h1>

    <div class="usuarios-container">
        <?php foreach ($usuarios as $usuario): ?>
            <div class="usuario-card">
                <h3><?= $usuario['nombre'] ?></h3>
                <p><strong>Email:</strong> <?= $usuario['email'] ?></p>
                <p><strong>Tipo:</strong> <?= ucfirst($usuario['tipo']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="back-button" href="admin.php">⬅️ Volver</a>

</body>
</html>
