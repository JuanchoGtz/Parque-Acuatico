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
?>

<h2>Selecciona tus entradas y productos:</h2>

<form action="../controllers/compraController.php" method="POST">

<label>Entradas:</label>
    <select name="entrada_id">
        <?php
        $stmt = $conn->query("SELECT * FROM Entradas");
        $entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($entradas as $entrada): ?>
            <option value="<?= $entrada['id'] ?>">
                <?= $entrada['tipo'] ?> - $<?= $entrada['precio'] ?>
            </option>
        <?php endforeach; ?>
    </select>
 <br>
    <label>Productos:</label><br>
    <?php foreach ($productos as $producto): ?>
        <input type="checkbox" name="productos[<?= $producto['id'] ?>]" value="<?= $producto['id'] ?>">
        <?= $producto['nombre'] ?> - $<?= number_format($producto['precio'], 2) ?>
        <input type="number" name="cantidad[<?= $producto['id'] ?>]" value="1" min="1"><br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Comprar</button>
</form>
