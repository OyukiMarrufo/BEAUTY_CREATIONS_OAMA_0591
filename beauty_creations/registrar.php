<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    } else {
        // Encriptar la contraseña para mayor seguridad
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Verificar si el correo ya existe
        $check_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $conexion->query($check_email);

        if ($resultado->num_rows > 0) {
            echo "<script>alert('El correo ya está registrado.');</script>";
        } else {
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";
            if ($conexion->query($sql) === TRUE) {
                echo "<script>alert('¡Registro exitoso! Ya puedes iniciar sesión.'); window.location.href='sesion.php';</script>";
            } else {
                echo "<script>alert('Error al registrar: " . $conexion->error . "');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Registro</title>
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

    .contenido-flex {
        display: flex; /*Organiza y alinea los elementos*/
        align-items: center; /* Alinea verticalmente al centro */
        justify-content: center; /*Centra los elementos horizontalmente*/
        gap: 40px; /* Espacio entre el texto y la imagen */
        text-align: left; /* Alinea el texto a la izquierda para mejor lectura */
        max-width: 900px; /*Limita el ancho*/
        margin: 0 auto;
    }

    .imagen-centro {
        max-width: 300px; /*Limita el ancho*/
        height: auto; /*Para que un elemento ajuste automáticamente su altura según el CONTENIDO*/
        border-radius: 8px; /*Redondea las esquinas*/
    }

    h1.titulo-seccion { 
        color: #9370D8; 
        margin-bottom: 15px; /*Agrega un espacio exterior en la parte inferor*/
        font-size: 36px;
    }

    .texto-inicio {
        font-size: 22px;
        line-height: 1.4; /*Espacio vertical (interlineado) entre las líneas de un texto de forma proporcional*/
        color: #333;
        margin: 0;
        font-weight: normal;
    }

    /* Estilos de la Tarjeta de Registro */
    .card-register { 
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

    .btn-register {
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

    .btn-register:hover {
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
            <li><a href="sesion.php">Iniciar Sesion</a></li>
            <li><a href="registrar.php" class="activo">Registrarme</a></li>
        </ul>
    </nav>

    <!-- FORMULARIO DE REGISTRO -->
    <main class="contenedor-cuerpo">
        <div class="card-register">
            <h2 class="card-title">Crear Cuenta</h2>
            <form action="registrar.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre Completo</label>
                    <div class="input-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>
                    </div>
                </div>

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

                <div class="form-group">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    <div class="input-container">
                        <i class="fa-solid fa-shield-halved"></i>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn-register">Registrarse</button>
            </form>
        </div>
    </main>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>
</body>
</html>