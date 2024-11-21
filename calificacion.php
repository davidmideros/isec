<?php

include '../Configuracion/config.php';

// Capturar datos del formulario
if (isset($_POST['calificar'])) {
    $calific = $_POST['calificacion'];

    // Validar calificación
    if ($calific >= 1 && $calific <= 5) {
        $insertDatos = "INSERT INTO calificacion VALUES('', '$calific')";
        $ejecutarInsertar = mysqli_query($conexion, $insertDatos);
    }
}
?>

