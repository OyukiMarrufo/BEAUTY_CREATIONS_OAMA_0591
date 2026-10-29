<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        
        // Verificar la contraseña encriptada
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            echo "<script>alert('¡Bienvenido/a " . $usuario['nombre'] . "!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Contraseña incorrecta.');</script>";
        }
    } else {
        echo "<script>alert('El correo electrónico no está registrado.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Iniciar Sesion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
    header {
        background-color: #FFB6C1;
        padding: 25px;
        color: white;
        display: table;
        width: 100%;
        box-sizing: border-box; /*Sirve para el ancho,alto y bordes*/
    }

    header h1 { 
        margin: 0; 
        font-size: 100px; 
        text-transform: uppercase; /*Muestra todo el texto seleccionado en mayusculas*/
        letter-spacing: 40px; /*Espacio entre las letras*/
    }

    .header-col {
        display: table-cell; /*Añadido para estructurar las columnas de la tabla*/
        vertical-align: middle;/*Centra un elemento en linea recta*/
    }

    .col-titulo { 
        width: 50%; 
        text-align: center; 
    }

    nav { background-color: #90EE90; padding: 10px 0; } /*Color y tamaño de la barra de navegacion*/
    nav ul { list-style-type: none; margin: 0; padding: 0; text-align: center; } /*Texto de la barra centrado*/
    nav ul li { display: inline; margin: 0 20px; } /*Apartados de la barra subrayados*/
    nav ul li a {
        color: black;
        text-decoration: none;/*Quita cualquier linea decorativa del texto*/
        font-weight: bold;/*Texto en negrita*/
        font-size: 18px;
    }

    .contenedor-cuerpo {
        padding: 40px;
        text-align: center;
        min-height: 400px; /*Altura minima*/
        display: flex; /*Organiza y alinea los elementos*/
        justify-content: center; /*Centra los elementos horizontalmente*/
        align-items: center; /*Centra los elemrntos verticalmente*/
    }

    .card-login { 
        background-color: #ffffff; 
        color: #1f2937; 
        border-radius: 12px; 
        padding: 35px 40px; 
        width: 100%; 
        max-width: 480px; 
        text-align: center; 
        box-shadow: 0 4px 15px rgba(0,0,0,0.3); 
    }

    .card-title { 
        font-size: 24px; 
        font-weight: bold; 
        color: #0f172a; 
        margin-bottom: 20px; 
    }

    /* Estilos del formulario dentro de la tarjeta */
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    .input-container {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-container i {
        position: absolute;
        left: 10px;
        color: #888;
    }

    .input-container input {
        width: 100%;
        padding: 10px 10px 10px 35px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        background-color: #FFB6C1;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 15px;
        transition: background-color 0.3s;
    }

    .btn-login:hover {
        background-color: #ff94a6;
    }

    footer {
        background-color: #7FFFD4;
        padding: 30px;
        text-align: center;
        color: black;
        font-size: 20px;
        width: 100%;
        box-sizing: border-box; /*Incluye relleno y bordes dentro del ancho y alto*/
        margin-top: 20px; /*Agerga un espacio en la parte superior de un elemento, separándolo de lo que tenga justo encima*/
    }
</style>

<body>
    <header>
        <div class="header-col col-titulo">
            <h1>BEAUTY CREATIONS</h1> 
            <p><em>"Aqui encontraras los mejores productos de maquillaje"</em></p>
        </div>
    </header>
 
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="sesion.php" class="activo">Iniciar Sesion</a></li>
            <li><a href="registrar.php">Registrarme</a></li>
        </ul>
    </nav>

    <!-- FORMULARIO DE INICIO DE SESIÓN -->
    <main class="contenedor-cuerpo">
        <div class="card-login">
            <h2 class="card-title">Iniciar Sesión</h2>
            <form action="sesion.php" method="POST">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-container">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-container">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn-login">Ingresar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>
</body>
</html>