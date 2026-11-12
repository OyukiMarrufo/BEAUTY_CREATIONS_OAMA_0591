<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Inicio</title>
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
        .card-bienvenida { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); max-width: 950px; width: 100%; }
        .contenido-flex { display: flex; align-items: center; justify-content: center; gap: 40px; text-align: left; }
        .imagen-centro { max-width: 320px; width: 100%; height: auto; border-radius: 15px; box-shadow: 0 6px 15px rgba(0,0,0,0.12); transition: transform 0.3s ease; }
        .imagen-centro:hover { transform: scale(1.03); }
        h1.titulo-seccion { color: #9370D8; margin-top: 0; margin-bottom: 20px; font-size: 36px; }
        .texto-inicio { font-size: 22px; line-height: 1.4; color: #333; margin: 0; font-weight: normal; }
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
            <li><a href="index.php" class="activo">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="nuevo.php">Nuevo</a></li>
            <li><a href="collabs.php">Collabs</a></li>
            <li><a href="tendencia.php">Tendencia</a></li>
        </ul>
        <ul class="menu-derecha">
            <li class="dropdown-usuario">
                <a href="#" id="btnMenuUsuario" title="Cuenta" class="btn-icon-sesion">
                    <i class="fa-solid fa-user"></i>
                </a>
                <div class="menu-desplegable-usuario" id="menuUsuario">
                    <a href="sesion.php" class="btn-drop-login">Iniciar Sesión</a>
                    <a href="registrar.php" class="btn-drop-register">¿No tienes cuenta? <span>Regístrate</span></a>
                </div>
            </li>
        </ul>
    </nav>

    <section class="contenedor-cuerpo">
        <div class="card-bienvenida">
            <div class="contenido-flex">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU4g4NP1p0ss79iFZS0lKvXImTRP-ap2Xs2_a0RDGBUCABc5xF-CamY0hA&s=10" alt="Imagen Principal Beauty Creations" class="imagen-centro">
                <article>
                    <h1 class="titulo-seccion">"Maquillaje para expresarte a tu manera"</h1>
                    <p class="texto-inicio">
                        "Bienvenido a BEAUTY CREATIONS. Maquillaje actual, bonito y versátil para tu día a día. Encuentra las últimas tendencias en maquillaje con envíos a todo el país. ¡Maquillate como eres!"
                    </p>
                </article>
            </div>
        </div>
    </section>

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