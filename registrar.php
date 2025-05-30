<?php
include("con_db.php");

// Verificar si los campos 'patente' y 'tipo' están completos
if (!empty($_POST['patente']) && !empty($_POST['tipo'])) {
    $patente = $_POST['patente'];
    $tipo = $_POST['tipo'];

    // SQL para insertar el vehículo
    $sql = "INSERT INTO vehiculos(patente, tipo) VALUES ('$patente', '$tipo')";
    $resultado = mysqli_query($con, $sql);

    // Verificar si la inserción fue exitosa
    if ($resultado) {
        // Mensaje de éxito
        echo "<div style='padding: 10px; background-color: #4CAF50; color: white; text-align: center; border-radius: 5px; box-shadow: 0px 4px 8px rgba(0, 255, 0, 0.2);'>
                Vehículo registrado correctamente.
              </div>";
    } else {
        // Mensaje de error
        echo "<div style='padding: 10px; background-color: #FF5722; color: white; text-align: center; border-radius: 5px; box-shadow: 0px 4px 8px rgba(255, 87, 34, 0.2);'>
                Error al registrar vehículo.
              </div>";
    }
} else {
    // Mensaje si faltan campos
    echo "<div style='padding: 10px; background-color: #FF5722; color: white; text-align: center; border-radius: 5px; box-shadow: 0px 4px 8px rgba(255, 87, 34, 0.2);'>
            Por favor complete todos los campos.
          </div>";
}

// Botón "Volver al Inicio"
echo "<div style='margin-top: 20px; text-align: center;'>
        <a href='inicio.php' style='text-decoration: none;'>
            <button style='padding: 12px 25px; background-color: #007BFF; color: white; font-size: 1.2rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease, transform 0.2s ease;'>
                🏠 Volver al Inicio
            </button>
        </a>
      </div>";
?>
