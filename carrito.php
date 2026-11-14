<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Mi Carrito</title>
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

        .contenedor-cuerpo { padding: 50px 20px; background-color: #FFE4C4; min-height: 450px; text-align: center; }
        .card-carrito { background: white; padding: 35px; border-radius: 20px; max-width: 900px; margin: 0 auto; box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #ffb6c1; color: white; }

        .total-box { text-align: right; font-size: 22px; font-weight: bold; color: #333; margin-top: 20px; }
        .total-box span { color: #d81b60; }

        .botones-carrito { display: flex; justify-content: flex-end; gap: 15px; margin-top: 25px; }
        .btn-vaciar { background-color: #ff4d4d; color: white; border: none; padding: 14px 24px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.3s; }
        .btn-vaciar:hover { background-color: #cc0000; }
        .btn-pagar { background-color: #28a745; color: white; border: none; padding: 14px 28px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.3s; }
        .btn-pagar:hover { background-color: #218838; }

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
                <a href="carrito.php" title="Carrito de Compras" class="btn-icon-sesion activo">
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

    <main class="contenedor-cuerpo">
        <div class="card-carrito">
            <h2 style="color: #d81b60; margin-top: 0;">Mi Carrito de Compras</h2>
            
            <div id="tablaContenedor"></div>
            <div class="total-box" id="totalContenedor" style="display: none;">
                Total a pagar: <span id="montoTotal">$0.00 MXN</span>
            </div>

            <div class="botones-carrito" id="grupoBotones" style="display: none;">
                <button class="btn-vaciar" id="btnVaciar"><i class="fa-solid fa-trash"></i> Vaciar Carrito</button>
                <button class="btn-pagar" id="btnPagar"><i class="fa-solid fa-credit-card"></i> Pagar Pedido</button>
            </div>
        </div>
    </main>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const contenedor = document.getElementById("tablaContenedor");
        const totalContenedor = document.getElementById("totalContenedor");
        const montoTotal = document.getElementById("montoTotal");
        const grupoBotones = document.getElementById("grupoBotones");
        const btnVaciar = document.getElementById("btnVaciar");
        const btnPagar = document.getElementById("btnPagar");
        const contadorBadge = document.getElementById("contador-carrito");

        function renderizarCarrito() {
            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            let totalArticulos = carrito.reduce((acc, item) => acc + parseInt(item.cantidad), 0);
            
            if (totalArticulos > 0) {
                contadorBadge.innerText = totalArticulos;
                contadorBadge.style.display = "inline-block";
            } else {
                contadorBadge.style.display = "none";
            }

            if (carrito.length === 0) {
                contenedor.innerHTML = "<p style='font-size: 18px; color: #555;'>Tu carrito está vacío. ¡Ve a Productos para agregar tus favoritos!</p>";
                totalContenedor.style.display = "none";
                grupoBotones.style.display = "none";
                return;
            }

            let sumaDinero = 0;
            let html = "<table><tr><th>Producto</th><th>Precio Unit.</th><th>Cantidad</th><th>Subtotal</th><th>Datos de Envío</th></tr>";
            
            carrito.forEach(item => {
                let precioNum = parseFloat(item.precio.replace(/[^0-9.]/g, '')) || 0;
                let subtotal = precioNum * parseInt(item.cantidad);
                sumaDinero += subtotal;

                html += `<tr>
                    <td><strong>${item.nombre}</strong></td>
                    <td>${item.precio}</td>
                    <td>${item.cantidad}</td>
                    <td>$${subtotal.toFixed(2)} MXN</td>
                    <td style="font-size: 13px;">
                        <strong>${item.cliente}</strong><br>
                        <span style="color:#555;">${item.correo || ''} | Tel: ${item.telefono || ''}</span><br>
                        <span style="color:#666;">${item.direccion}, ${item.ciudad || ''}, ${item.estado || ''}, ${item.pais || ''} (${item.pago})</span>
                        ${item.descripcion ? `<br><em style="color:#d81b60;">Nota: ${item.descripcion}</em>` : ''}
                    </td>
                </tr>`;
            });
            html += "</table>";

            contenedor.innerHTML = html;
            montoTotal.innerText = `$${sumaDinero.toFixed(2)} MXN`;
            totalContenedor.style.display = "block";
            grupoBotones.style.display = "flex";
        }

        btnVaciar.addEventListener("click", () => {
            if (confirm("¿Estás segura de que deseas vaciar todos los productos del carrito?")) {
                localStorage.removeItem("carrito");
                renderizarCarrito();
            }
        });

        btnPagar.addEventListener("click", () => {
            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            if (carrito.length === 0) return;

            fetch("guardar_pedido.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(carrito)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("¡Gracias por tu compra! Tu pedido ha sido pagado y registrado en la base de datos.");
                    localStorage.removeItem("carrito");
                    renderizarCarrito();
                } else {
                    alert("Error al procesar el pago: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Error de conexión con el servidor.");
            });
        });

        renderizarCarrito();

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