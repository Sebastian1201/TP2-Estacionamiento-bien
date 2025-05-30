<?php
include("con_db.php");

$sql = "SELECT *, 
TIMESTAMPDIFF(MINUTE, hora_ingreso, hora_salida) AS minutos 
FROM vehiculos 
WHERE hora_salida IS NOT NULL";

$resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiempo de Permanencia</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo para el contenedor de la tabla */
        .table-container {
            max-height: 400px;  /* Máxima altura visible de la tabla */
            overflow-y: auto;  /* Desplazamiento vertical */
            margin-top: 20px;
        }

        .vehiculos-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        .vehiculos-table th, .vehiculos-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .vehiculos-table th {
            background-color: #007BFF;
            color: white;
        }

        .vehiculos-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .vehiculos-table tr:hover {
            background-color: #ddd;
        }

        /* Estilo para el botón "Volver al Inicio" */
        .back-button {
            padding: 12px 25px;
            background-color: #007BFF;
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Vehículos que ya salieron</h2>

        <div class="table-container">
            <table class="vehiculos-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patente</th>
                        <th>Tipo</th>
                        <th>Hora Ingreso</th>
                        <th>Hora Salida</th>
                        <th>Tiempo Permanencia (min)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['patente']; ?></td>
                        <td><?php echo $fila['tipo']; ?></td>
                        <td><?php echo $fila['hora_ingreso']; ?></td>
                        <td><?php echo $fila['hora_salida']; ?></td>
                        <td><?php echo $fila['minutos']; ?> min</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="back-container">
            <a href="inicio.php" class="button">
                <button class="back-button">🏠 Volver al Inicio</button>
            </a>
        </div>
    </div>
</body>
</html>


