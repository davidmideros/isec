<?php

include '../Configuracion/config.php';

if (isset($_POST['login'])) {
    $Usuario = $_POST['usuario'];
    $Contrasena = $_POST['contrasena'];

    // Consulta para verificar si el usuario existe.
    $consultaUsuario = "SELECT * FROM usuario WHERE usuario = '$Usuario' OR correo = '$Usuario'";
    $resultadoConsulta = mysqli_query($conexion, $consultaUsuario);

    if (mysqli_num_rows($resultadoConsulta) > 0) {
        // Si el usuario existe, obtenemos la información.
        $filaUsuario = mysqli_fetch_assoc($resultadoConsulta);
        $hashContrasena = $filaUsuario['contrasena'];

        // Verificamos la contraseña ingresada con el hash almacenado.
        if (password_verify($Contrasena, $hashContrasena)) {
            // Si la contraseña es correcta, iniciamos sesión y redirigimos.
            session_start();
            $_SESSION['usuario'] = $Usuario; // Guardamos el nombre de usuario en la sesión.

            echo "<script>
            alert('Inicio de sesión exitoso.');
            window.location.href = 'index.hmtl';
            </script>";
            exit();
        } else {
            // Si la contraseña es incorrecta.
            echo "<script>
            alert('Contraseña incorrecta. Inténtalo de nuevo.');
            window.location.href = 'Login.html';
            </script>";
            exit();
        }
    } else {
        // Si el usuario no existe.
        echo "<script>
        alert('Usuario no encontrado. Verifica tus datos o regístrate.');
        window.location.href = 'Login.html';
        </script>";
        exit();
    }
}
?>
