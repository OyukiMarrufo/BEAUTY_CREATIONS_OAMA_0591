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
    <title>Beauty Creations - Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #fafafa;
    }

    header {
        background-color: #FFB6C1;
        padding: 35px 20px;
        color: white;
        text-align: center;
        box-sizing: border-box;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    header h1 { 
        margin: 0; 
        font-size: 75px; 
        text-transform: uppercase;
        letter-spacing: 25px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
    }

    header p { font-size: 20px; margin-top: 10px; }

    nav { 
        background-color: #90EE90; 
        padding: 12px 20px; 
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    nav ul { 
        list-style-type: none; 
        margin: 0; 
        padding: 0; 
        display: flex;
        align-items: center;
    }

    nav ul.menu-centrado li { margin: 0 12px; } 
    nav ul.menu-derecha { position: absolute; right: 25px; }
    nav ul.menu-derecha li { margin-left: 15px; }
    
    nav ul li a {
        color: #111;
        text-decoration: none;
        font-weight: bold;
        font-size: 18px;
        padding: 8px 16px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    nav ul li a:hover, nav ul li a.activo {
        background-color: rgba(255, 255, 255, 0.6);
        color: #d81b60;
    }

    .btn-icon-sesion {
        font-size: 22px;
        color: black;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contenedor-cuerpo {
        padding: 50px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #FFE4C4;
        min-height: 420px;
    }

    .card-login { 
        background-color: #ffffff; 
        color: #1f2937; 
        border-radius: 20px; 
        padding: 40px; 
        width: 100%; 
        max-width: 450px; 
        text-align: center; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.08); 
    }

    .card-title { 
        font-size: 26px; 
        font-weight: bold; 
        color: #0f172a; 
        margin-bottom: 25px; 
        margin-top: 0;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
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
        left: 12px;
        color: #888;
    }

    .input-container input {
        width: 100%;
        padding: 12px 12px 12px 40px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background-color: #FFB6C1;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .btn-login:hover {
        background-color: #ff94a6;
    }

    footer {
        background-color: #7FFFD4;
        padding: 25px;
        text-align: center;
        color: black;
        font-size: 18px;
        width: 100%;
        box-sizing: border-box;
        margin-top: 20px;
    }
</style>

<body>
    <header>
        <div class="col-titulo">
            <h1>BEAUTY CREATIONS</h1> 
            <p><em>"Aqui encontraras los mejores productos de maquillaje"</em></p>
        </div>
    </header>
 
    <nav>
        <ul class="menu-centrado">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="nuevo.php">Nuevo</a></li>
            <li><a href="collabs.php">Collabs</a></li>
            <li><a href="tendencia.php">Tendencia</a></li>
        </ul>
        <ul class="menu-derecha">
            <li><a href="registrar.php">Registrarme</a></li>
            <li><a href="sesion.php" title="Iniciar Sesión" class="btn-icon-sesion activo"><i class="fa-solid fa-user"></i></a></li>
        </ul>
    </nav>

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