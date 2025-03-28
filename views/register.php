<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptamos la contraseña

    // Verificar si el correo ya existe
    $stmt = $conn->prepare("SELECT id FROM Usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo "<p style='color:red;'>Este correo ya está registrado.</p>";
    } else {
        // Insertar usuario en la BD
        $stmt = $conn->prepare("INSERT INTO Usuarios (nombre, email, password, tipo) VALUES (?, ?, ?, 'cliente')");
        if ($stmt->execute([$nombre, $email, $password])) {
            echo "<p style='color:green;'>Registro exitoso. <a href='login.php'>Inicia sesión aquí</a></p>";
        } else {
            echo "<p style='color:red;'>Error al registrar.</p>";
        }
    }
}
?>

<h2>Registro de Usuario</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Correo:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit">Registrarse</button>
</form>

<p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
