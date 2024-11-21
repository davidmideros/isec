<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname="isec";

$conexion =new mysqli($servername, $username, $password, $bdname);
if($conexion->connect_error){
    die("Error en la conexión". $conexion->connect_error);
}

//echo 'conexión exitosa';
?>