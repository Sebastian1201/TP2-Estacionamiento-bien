<?php
$mensaje = "";
$conex = mysqli_connect("localhost", "root", "", "registro");

if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];
    $confirmarPassword = $_POST['confirmar_password'];

    if ($nombre && $apellido && $email && $usuario && $password && $confirmarPassword) {
        if ($password === $confirmarPassword) {
            $sql = "SELECT * FROM registronuevo WHERE user = '$usuario' OR email = '$email'";
            $result = mysqli_query($conex, $sql);

            if (mysqli_num_rows($result) == 0) {
                $pass_cifrada = password_hash($password, PASSWORD_DEFAULT);
                $insert_sql = "INSERT INTO registronuevo (nombre, apellido, email, user, pass)
                               VALUES ('$nombre', '$apellido', '$email', '$usuario', '$pass_cifrada')";

                if (mysqli_query($conex, $insert_sql)) {
                    header("Location: index.php"); // Redirige al login
                    exit();
                } else {
                    $mensaje = "¡Error al registrar!";
                }
            } else {
                $mensaje = "El usuario o email ya existen.";
            }
        } else {
            $mensaje = "Las contraseñas no coinciden.";
        }
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }
}

mysqli_close($conex);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 360px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            text-align: left;
        }
        label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }
        input[type="submit"] {
            background-color: #007BFF;
            border: none;
            padding: 12px;
            font-size: 1rem;
            color: white;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        p.message {
            color: red;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }
        .links {
            margin-top: 15px;
            text-align: center;
        }
        .links a {
            color: #007BFF;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .links a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Crear cuenta</h2>

        <?php if ($mensaje): ?>
            <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <form action="registro.php" method="post" autocomplete="off">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmar_password">Confirmar Contraseña:</label>
            <input type="password" id="confirmar_password" name="confirmar_password" required>

            <input type="submit" name="registrar" value="Registrar">
        </form>

        <div class="links">
            <a href="index.php">¿Ya tienes cuenta? Inicia sesión aquí</a>
        </div>
    </div>
</body>
</html>
