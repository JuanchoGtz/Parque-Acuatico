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
    <?php
    $stmt = $conn->query("SELECT * FROM Entradas");
    $entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($entradas as $entrada): ?>
        <div>
            <label><?= $entrada['tipo'] ?> - $<?= $entrada['precio'] ?> c/u</label>
            <input type="hidden" name="entrada_id[]" value="<?= $entrada['id'] ?>">
            <input type="number" name="cantidad_entrada[]" value="0" min="0">
        </div>
    <?php endforeach; ?>
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
