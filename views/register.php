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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: "Roboto", sans-serif;
            background-color: #F4F4F4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #1d6cd8;
            font-weight: bold;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #1d6cd8;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background: #155bb5;
        }

        p {
            margin-top: 15px;
        }

        a {
            text-decoration: none;
            color: #1d6cd8;
            font-weight: bold;
        }

        a:hover {
            color: #155bb5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📝 Registro de Usuario</h2>
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
    </div>
</body>
</html>

