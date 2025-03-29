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
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['tipo'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="admin.php">Volver</a>
</body>
</html>
