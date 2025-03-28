<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Obtener los datos del formulario
$adultos = isset($_POST['adultos']) ? (int)$_POST['adultos'] : 0;
$ninos = isset($_POST['ninos']) ? (int)$_POST['ninos'] : 0;
$productosSeleccionados = isset($_POST['productos']) ? $_POST['productos'] : [];
$cantidades = isset($_POST['cantidad']) ? $_POST['cantidad'] : [];

$total = 0;
$codigo_unico = uniqid("PA_"); // Código único para la compra

try {
    $conn->beginTransaction();

    // Insertar la venta en la tabla Ventas
    $stmt = $conn->prepare("INSERT INTO Ventas (usuario_id, codigo_unico, total) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $codigo_unico, $total]);
    $venta_id = $conn->lastInsertId();

    // Insertar boletos de Adultos
    if ($adultos > 0) {
        $subtotal = $adultos * 180;
        $total += $subtotal;
        $stmt = $conn->prepare("INSERT INTO Detalle_Venta (venta_id, entrada_id, cantidad, subtotal) VALUES (?, 1, ?, ?)");
        $stmt->execute([$venta_id, $adultos, $subtotal]);
    }

    // Insertar boletos de Niños
    if ($ninos > 0) {
        $subtotal = $ninos * 120;
        $total += $subtotal;
        $stmt = $conn->prepare("INSERT INTO Detalle_Venta (venta_id, entrada_id, cantidad, subtotal) VALUES (?, 2, ?, ?)");
        $stmt->execute([$venta_id, $ninos, $subtotal]);
    }

    // Insertar productos seleccionados
    if (!empty($productosSeleccionados)) {
        foreach ($productosSeleccionados as $producto_id) {
            $cantidad = isset($cantidades[$producto_id]) ? (int)$cantidades[$producto_id] : 1;
            
            // Obtener el precio del producto
            $stmt = $conn->prepare("SELECT precio FROM Productos WHERE id = ?");
            $stmt->execute([$producto_id]);
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            $subtotal = $producto['precio'] * $cantidad;
            $total += $subtotal;

            // Insertar en Detalle_Venta
            $stmt = $conn->prepare("INSERT INTO Detalle_Venta (venta_id, producto_id, cantidad, subtotal) VALUES (?, ?, ?, ?)");
            $stmt->execute([$venta_id, $producto_id, $cantidad, $subtotal]);
        }
    }

    // Actualizar el total en la tabla Ventas
    $stmt = $conn->prepare("UPDATE Ventas SET total = ? WHERE id = ?");
    $stmt->execute([$total, $venta_id]);

    $conn->commit();

    // Redirigir con éxito
    header("Location: ../views/ticket.php?codigo=$codigo_unico");
    exit();
} catch (Exception $e) {
    $conn->rollBack();
    die("Error en la compra: " . $e->getMessage());
}
?>
