<?php

include '../Configuracion/config.php';

if (isset($_POST['registro'])) {
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellido'];
    $Correo = $_POST['correo'];
    $Usuario = $_POST['usuario'];
    $Contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptación de la contraseña.

    // Verificar si el usuario o el correo ya existen en la base de datos.
    $consultaExistente = "SELECT * FROM usuario WHERE correo = '$Correo' OR usuario = '$Usuario'";
    $resultadoConsulta = mysqli_query($conexion, $consultaExistente);

    if (mysqli_num_rows($resultadoConsulta) > 0) {
        // El usuario o el correo ya existen.
        echo "<script>
        alert('El usuario o el correo ya están registrados. Intente con otro.');
        window.location.href = 'Registro.html';
        </script>";
    } else {
        // Si no existe, procedemos a insertar los datos.
        $insertDatos = "INSERT INTO usuario VALUES('', '$Nombre', '$Apellido', '$Correo', '$Usuario', '$Contrasena')";

        $ejecutarInsertar = mysqli_query($conexion, $insertDatos);

        if ($ejecutarInsertar) {
            echo "<script>
            alert('Registro exitoso. Redirigiendo al inicio de sesión.');
            window.location.href = 'Login.html';
            </script>";
        } else {
            echo "<script>
            alert('Hubo un error en el registro. Inténtalo de nuevo.');
            window.location.href = 'Registro.html';
            </script>";
        }
    }
}
?>
