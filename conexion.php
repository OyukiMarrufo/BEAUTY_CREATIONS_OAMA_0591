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

// Crear tabla de pedidos si no existe
$tabla_sql = "CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(255) NOT NULL,
    precio VARCHAR(50) NOT NULL,
    cliente VARCHAR(255) NOT NULL,
    direccion TEXT NOT NULL,
    cantidad INT NOT NULL,
    pago VARCHAR(100) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conexion->query($tabla_sql);
?>