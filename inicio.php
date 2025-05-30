<?php
session_start();

// Permitir acceso si usuario tradicional o sesión con Google (access_token)
if (!isset($_SESSION["usuario"]) && !isset($_SESSION['access_token'])) {
    header("Location: index.php");
    exit();
}

// Mostrar nombre según sesión (usuario o Google)
if (isset($_SESSION["usuario"])) {
    $nombreUsuario = $_SESSION["usuario"];
} elseif (isset($_SESSION['user_first_name'])) {
    $nombreUsuario = $_SESSION['user_first_name'];
} else {
    $nombreUsuario = "Usuario";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Estacionamiento - Equipo 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📋 Panel de Control - Estacionamiento</h1>
        <h2>¡Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
        <a href="logout.php">Cerrar sesión</a>

        <div class="button-group">
            <a href="form.php" class="btn">➕ Registrar nuevo vehículo</a>
            <a href="lectura.php" class="btn">🚗 Ver vehículos estacionados</a>
            <a href="permanencia.php" class="btn">📊 Ver historial de salidas</a>
        </div>
    </div>
</body>
</html>
