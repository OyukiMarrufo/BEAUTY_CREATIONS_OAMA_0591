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
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

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
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background-color: #fafafa; }
        header { background-color: #FFB6C1; padding: 35px 20px; color: white; text-align: center; box-sizing: border-box; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); }
        header h1 { margin: 0; font-size: 75px; text-transform: uppercase; letter-spacing: 25px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15); }
        header p { font-size: 20px; margin-top: 10px; }

        nav { background-color: #90EE90; padding: 12px 20px; position: relative; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        nav ul { list-style-type: none; margin: 0; padding: 0; display: flex; align-items: center; }
        nav ul.menu-izquierda { position: absolute; left: 25px; }
        nav ul.menu-centrado li { margin: 0 12px; } 
        nav ul.menu-derecha { position: absolute; right: 25px; }
        nav ul.menu-derecha li { margin-left: 15px; }
        nav ul li a { color: #111; text-decoration: none; font-weight: bold; font-size: 18px; padding: 8px 16px; border-radius: 20px; transition: all 0.3s ease; }
        nav ul li a:hover, nav ul li a.activo { background-color: rgba(255, 255, 255, 0.6); color: #d81b60; }

        .btn-icon-sesion { font-size: 22px; color: black; display: flex; align-items: center; justify-content: center; position: relative; }
        .badge-carrito { position: absolute; top: -6px; right: -10px; background-color: #ff3366; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; font-weight: bold; display: none; }

        /* Menú desplegable de Usuario */
        .dropdown-usuario { position: relative; }
        .menu-desplegable-usuario {
            display: none;
            position: absolute;
            right: 0;
            top: 42px;
            background-color: #ffffff;
            min-width: 195px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            padding: 12px;
            z-index: 1000;
            text-align: center;
            border: 1px solid #f0f0f0;
        }
        .menu-desplegable-usuario.mostrar { display: block; }
        .menu-desplegable-usuario a.btn-drop-login {
            display: block;
            background-color: #FFB6C1;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 8px;
        }
        .menu-desplegable-usuario a.btn-drop-login:hover {
            background-color: #ff94a6;
            color: white;
        }
        .menu-desplegable-usuario a.btn-drop-register {
            display: block;
            font-size: 13px;
            font-weight: normal;
            color: #555;
            padding: 4px;
            text-decoration: none;
            background: none;
        }
        .menu-desplegable-usuario a.btn-drop-register span {
            color: #d81b60;
            font-weight: bold;
            text-decoration: underline;
        }
        .menu-desplegable-usuario a.btn-drop-register:hover {
            background: none;
            color: #111;
        }

        .contenedor-cuerpo { padding: 50px 20px; display: flex; justify-content: center; align-items: center; background-color: #FFE4C4; min-height: 420px; }
        .card-register { background-color: #ffffff; color: #1f2937; border-radius: 20px; padding: 40px; width: 100%; max-width: 480px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        .card-title { font-size: 26px; font-weight: bold; color: #0f172a; margin-bottom: 25px; margin-top: 0; }
        .form-group { margin-bottom: 18px; text-align: left; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: bold; color: #333; }
        .input-container { position: relative; display: flex; align-items: center; }
        .input-container i { position: absolute; left: 12px; color: #888; }
        .input-container input { width: 100%; padding: 12px 12px 12px 40px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; box-sizing: border-box; }
        .btn-register { width: 100%; padding: 14px; background-color: #FFB6C1; color: white; border: none; border-radius: 8px; font-size: 18px; font-weight: bold; cursor: pointer; margin-top: 15px; transition: background-color 0.3s; }
        .btn-register:hover { background-color: #ff94a6; }

        footer { background-color: #7FFFD4; padding: 25px; text-align: center; color: black; font-size: 18px; width: 100%; box-sizing: border-box; margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <div class="col-titulo">
            <h1>BEAUTY CREATIONS</h1> 
            <p><em>"Aqui encontraras los mejores productos de maquillaje"</em></p>
        </div>
    </header>
 
    <nav>
        <ul class="menu-izquierda">
            <li>
                <a href="carrito.php" title="Carrito de Compras" class="btn-icon-sesion">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge-carrito" id="contador-carrito">0</span>
                </a>
            </li>
        </ul>
        <ul class="menu-centrado">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="nuevo.php">Nuevo</a></li>
            <li><a href="collabs.php">Collabs</a></li>
            <li><a href="tendencia.php">Tendencia</a></li>
        </ul>
        <ul class="menu-derecha">
            <li class="dropdown-usuario">
                <a href="#" id="btnMenuUsuario" title="Cuenta" class="btn-icon-sesion activo">
                    <i class="fa-solid fa-user"></i>
                </a>
                <div class="menu-desplegable-usuario" id="menuUsuario">
                    <a href="sesion.php" class="btn-drop-login">Iniciar Sesión</a>
                    <a href="registrar.php" class="btn-drop-register">¿No tienes cuenta? <span>Regístrate</span></a>
                </div>
            </li>
        </ul>
    </nav>

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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const contadorBadge = document.getElementById("contador-carrito");
            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            let total = carrito.reduce((acc, item) => acc + parseInt(item.cantidad), 0);
            if (total > 0) {
                contadorBadge.innerText = total;
                contadorBadge.style.display = "inline-block";
            }

            // Abrir y cerrar menú de usuario
            const btnMenuUsuario = document.getElementById("btnMenuUsuario");
            const menuUsuario = document.getElementById("menuUsuario");

            if (btnMenuUsuario && menuUsuario) {
                btnMenuUsuario.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    menuUsuario.classList.toggle("mostrar");
                });

                window.addEventListener("click", (e) => {
                    if (!menuUsuario.contains(e.target) && e.target !== btnMenuUsuario) {
                        menuUsuario.classList.remove("mostrar");
                    }
                });
            }
        });
    </script>
</body>
</html>