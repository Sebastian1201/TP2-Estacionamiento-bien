<?php
include("con_db.php");

$sql = "SELECT * FROM vehiculos WHERE hora_salida IS NULL";
$resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos en el Estacionamiento</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo para la tabla */
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

        /* Estilo para el botón de salida */
        .salida-button {
            background-color: #28a745;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .salida-button:hover {
            background-color: #218838;
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
        <h2 class="title">Vehículos Actualmente Estacionados</h2>

        <div class="table-container">
            <table class="vehiculos-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patente</th>
                        <th>Tipo</th>
                        <th>Hora de Ingreso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['patente']; ?></td>
                        <td><?php echo $fila['tipo']; ?></td>
                        <td><?php echo $fila['hora_ingreso']; ?></td>
                        <td>
                            <a href="salida.php?id=<?php echo $fila['id']; ?>" class="button">
                                <button class="salida-button">Registrar Salida</button>
                            </a>
                        </td>
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
