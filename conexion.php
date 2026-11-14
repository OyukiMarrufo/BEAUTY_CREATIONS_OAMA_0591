<?php
$host = "localhost";
$usuario = "root";
$password = ""; // Por defecto en XAMPP no tiene contraseña
$base_datos = "beauty_creations";

// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Configurar conjunto de caracteres
$conexion->set_charset("utf8");
?>