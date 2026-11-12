<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Nuevo</title>
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

        .seccion-productos { background-color: #FFE4C4; padding: 50px 20px; min-height: 500px; }
        .titulo-catalogo { text-align: center; color: #d81b60; font-size: 32px; margin-bottom: 35px; text-shadow: 1px 1px 2px rgba(0,0,0,0.05); }
        .grid-productos { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 25px; max-width: 1200px; margin: 0 auto; }

        .tarjeta-producto { background-color: #ffffff; border: none; border-radius: 16px; padding: 18px; text-align: center; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06); display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; }
        .tarjeta-producto:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12); }
        .tarjeta-producto img { width: 100%; height: 230px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; background-color: #f8f9fa; }
        .nombre-producto { color: #333333; font-size: 18px; font-weight: bold; margin: 8px 0 4px 0; }
        .descripcion-corta { color: #6c757d; font-size: 14px; margin: 0 0 8px 0; font-style: italic; }
        .precio-producto { color: #d81b60; font-size: 18px; font-weight: bold; margin-bottom: 8px; }

        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000; }
        .modal-content { background: white; padding: 30px; border-radius: 16px; max-width: 420px; width: 90%; box-shadow: 0 10px 25px rgba(0,0,0,0.2); position: relative; }
        .cerrar-modal { position: absolute; top: 15px; right: 20px; font-size: 22px; cursor: pointer; color: #888; }
        .modal-content form label { display: block; margin: 12px 0 4px; font-weight: bold; color: #333; font-size: 14px; text-align: left; }
        .modal-content form input, .modal-content form select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box; font-size: 15px; }
        .btn-agregar-modal { width: 100%; background-color: #ffb6c1; color: white; border: none; padding: 14px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; margin-top: 20px; transition: background-color 0.3s; }
        .btn-agregar-modal:hover { background-color: #ff94a6; }

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
            <li><a href="nuevo.php" class="activo">Nuevo</a></li>
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

    <main class="seccion-productos">
        <h2 class="titulo-catalogo">Lo Más Nuevo de Beauty Creations</h2>

        <div class="grid-productos">
            <div class="tarjeta-producto" data-nombre="Floral Bloom Blush Duo" data-precio="$179.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/bcc-backup-beauty-creations-floral-bloom-blush-paleta-de-rubores-cosmetics-bf01-152807.jpg?v=1739234246" alt="Floral Bloom Blush">
                <div class="nombre-producto">Floral Bloom Blush Duo</div>
                <div class="descripcion-corta">Dúo de rubor sedoso en polvo</div>
                <div class="precio-producto">$179.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Final Finish Compact Powder" data-precio="$160.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/FINAL-FINISH-OPEN-COMPACT-FLASHY.png?v=1776388879" alt="Final Finish Pressed Powder">
                <div class="nombre-producto">Final Finish Compact Powder</div>
                <div class="descripcion-corta">Polvo compacto con acabado mate</div>
                <div class="precio-producto">$160.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Juicy Lip Oil Terracotta" data-precio="$139.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/TERRACOTTA-TEASE.jpg?v=1770159282" alt="Lip Oil Terracotta">
                <div class="nombre-producto">Juicy Lip Oil Terracotta</div>
                <div class="descripcion-corta">Aceite labial nutritivo no pegajoso</div>
                <div class="precio-producto">$139.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Eyebrow Definer Gel" data-precio="$129.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-eyebrow-definer-gel-delineador-de-cejas-en-gel-cosmetics-bg06-233544.jpg?v=1753301213" alt="Eyebrow Definer Gel">
                <div class="nombre-producto">Eyebrow Definer Gel</div>
                <div class="descripcion-corta">Gel fijador de cejas indeleble</div>
                <div class="precio-producto">$129.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Set de Brochas Nude (12 Pzas)" data-precio="$430.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/bcc-backup-beauty-creations-set-de-brochas-nude-x-12-pzas-set-de-brochas-de-12-piezas-bs12nx-695567.jpg?v=1723576342" alt="Set de Brochas Nude">
                <div class="nombre-producto">Set de Brochas Nude (12 Pzas)</div>
                <div class="descripcion-corta">Set profesional con cosmetiquera</div>
                <div class="precio-producto">$430.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Pastel Please Gel Liner" data-precio="$120.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-pastel-please-delineador-en-gel-pot-cosmetics-elgpp-5-842448.jpg?v=1739229402" alt="Pastel Please Gel Liner">
                <div class="nombre-producto">Pastel Please Gel Liner</div>
                <div class="descripcion-corta">Delineador en gel tonos pastel</div>
                <div class="precio-producto">$120.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Crystal High Shine Gloss" data-precio="$125.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-ultra-dazzle-gloss-labial-cosmetics-bclg04-634001.jpg?v=1723582541" alt="Crystal Lip Gloss">
                <div class="nombre-producto">Crystal High Shine Gloss</div>
                <div class="descripcion-corta">Brillo labial ultra brillante</div>
                <div class="precio-producto">$125.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Hydrating Glow Primer Mist" data-precio="$175.00 MXN">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIagxQcY8j_2_j2BLg1I0MqMXLK9d9lLYTXBJJv-BpgQ&s=10" alt="Glow Primer Mist">
                <div class="nombre-producto">Hydrating Glow Primer Mist</div>
                <div class="descripcion-corta">Bruma hidratante iluminadora</div>
                <div class="precio-producto">$175.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Velvet Stay Lip Crayon" data-precio="$130.00 MXN">
                <img src="https://www.cosmeticosalamoda.com/cdn/shop/products/PROMISESWITHME.png?v=1738776003&width=823" alt="Velvet Lip Crayon">
                <div class="nombre-producto">Velvet Stay Lip Crayon</div>
                <div class="descripcion-corta">Lápiz labial suave terciopelo</div>
                <div class="precio-producto">$130.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Eyeshadow Primer Base" data-precio="$120.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-primer-de-sombras-neutro-cosmetics-ebn02-916811.webp?v=1753301409" alt="Eyeshadow Primer Base">
                <div class="nombre-producto">Eyeshadow Primer Base</div>
                <div class="descripcion-corta">Prebase de sombras de larga duración</div>
                <div class="precio-producto">$120.00 MXN</div>
            </div>
        </div>
    </main>

    <!-- Modal Formulario de Agregar al Carrito -->
    <div class="modal-overlay" id="modalAgregar">
        <div class="modal-content">
            <span class="cerrar-modal" id="btnCerrarModal">&times;</span>
            <h2 style="margin-top: 0; color: #333; text-align: left;">Formulario de Compra</h2>
            
            <p style="text-align: left;"><strong>Producto seleccionado:</strong> <span id="modalNombre" style="color: #d81b60; font-weight: bold;">-</span></p>
            <p style="text-align: left;"><strong>Precio:</strong> <span id="modalPrecio" style="color: #333; font-weight: bold;">-</span></p>

            <form id="formAgregarCarrito">
                <label for="inputNombre">Nombre completo:</label>
                <input type="text" id="inputNombre" placeholder="Tu nombre" required>

                <label for="inputDireccion">Dirección de envío:</label>
                <input type="text" id="inputDireccion" placeholder="Calle, número y colonia" required>

                <label for="inputCantidad">Cantidad:</label>
                <input type="number" id="inputCantidad" value="1" min="1" required>

                <label for="selectPago">Método de pago:</label>
                <select id="selectPago">
                    <option>Tarjeta de Crédito / Débito</option>
                    <option>Efectivo (OXXO)</option>
                    <option>Transferencia SPEI</option>
                </select>

                <button type="submit" class="btn-agregar-modal">Agregar al Carrito</button>
            </form>
        </div>
    </div>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("modalAgregar");
        const btnCerrar = document.getElementById("btnCerrarModal");
        const formAgregar = document.getElementById("formAgregarCarrito");
        const modalNombre = document.getElementById("modalNombre");
        const modalPrecio = document.getElementById("modalPrecio");
        const contadorBadge = document.getElementById("contador-carrito");

        let productoActual = {};

        function actualizarContador() {
            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            let total = carrito.reduce((acc, item) => acc + parseInt(item.cantidad), 0);
            if (total > 0) {
                contadorBadge.innerText = total;
                contadorBadge.style.display = "inline-block";
            } else {
                contadorBadge.style.display = "none";
            }
        }

        document.querySelectorAll(".tarjeta-producto").forEach(tarjeta => {
            tarjeta.addEventListener("click", () => {
                const nombre = tarjeta.getAttribute("data-nombre");
                const precio = tarjeta.getAttribute("data-precio");
                productoActual = { nombre, precio };
                
                modalNombre.innerText = nombre;
                modalPrecio.innerText = precio;
                modal.style.display = "flex";
            });
        });

        btnCerrar.addEventListener("click", () => modal.style.display = "none");
        window.addEventListener("click", (e) => { if (e.target === modal) modal.style.display = "none"; });

        formAgregar.addEventListener("submit", (e) => {
            e.preventDefault();
            const item = {
                nombre: productoActual.nombre,
                precio: productoActual.precio,
                cliente: document.getElementById("inputNombre").value,
                direccion: document.getElementById("inputDireccion").value,
                cantidad: parseInt(document.getElementById("inputCantidad").value),
                pago: document.getElementById("selectPago").value
            };

            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            carrito.push(item);
            localStorage.setItem("carrito", JSON.stringify(carrito));

            actualizarContador();
            modal.style.display = "none";
            formAgregar.reset();
            alert("¡Producto agregado al carrito!");
        });

        actualizarContador();

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