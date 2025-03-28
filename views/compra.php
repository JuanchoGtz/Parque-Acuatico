<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $conn->query("SELECT * FROM Productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Selecciona tus entradas y productos:</h2>

<form action="../controllers/compraController.php" method="POST">
    <label>Entradas:</label>
    <select name="entrada_id">
        <option value="1">Adulto - $180</option>
        <option value="2">Niño - $120</option>
    </select>

    <label>Productos:</label>
    <select name="producto_id">
        <?php foreach ($productos as $producto): ?>
            <option value="<?= $producto['id'] ?>">
                <?= $producto['nombre'] ?> - $<?= $producto['precio'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" value="1" required>

    <button type="submit">Comprar</button>
</form>
