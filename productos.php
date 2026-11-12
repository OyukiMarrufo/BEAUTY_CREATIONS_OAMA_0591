<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Productos</title>
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
            <li><a href="productos.php" class="activo">Productos</a></li>
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

    <main class="seccion-productos">
        <h2 class="titulo-catalogo">Catálogo de Productos Beauty Creations</h2>

        <div class="grid-productos">
            <div class="tarjeta-producto" data-nombre="Flawless Stay Foundation" data-precio="$270.00 MXN">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFMdHByvMcYpoWq6RuKF3rOPnpcoVoxsItJfLsPYRd0Q&s=10" alt="Flawless Stay Foundation">
                <div class="nombre-producto">Flawless Stay Foundation</div>
                <div class="descripcion-corta">Base líquida libre de aceite</div>
                <div class="precio-producto">$270.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Flawless Stay Concealer" data-precio="$149.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/corrector.jpg?v=1753388872&width=400" alt="Flawless Stay Concealer">
                <div class="nombre-producto">Flawless Stay Concealer</div>
                <div class="descripcion-corta">Corrector líquido alta cobertura</div>
                <div class="precio-producto">$149.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Bye Filter Loose Powder" data-precio="$190.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-bye-filter-polvo-fijador-cosmetics-bfp01-340036.webp?v=1753389323" alt="Bye Filter Loose Powder">
                <div class="nombre-producto">Bye Filter Loose Powder</div>
                <div class="descripcion-corta">Polvo traslúcido suelto matificante</div>
                <div class="precio-producto">$190.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Setting Spray Peach" data-precio="$165.00 MXN">
                <img src="data:image/jpeg;base64,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" alt="Setting Spray Peach">
                <div class="nombre-producto">Setting Spray Peach</div>
                <div class="descripcion-corta">Fijador con aroma a durazno</div>
                <div class="precio-producto">$165.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Tease Me Eyeshadow Palette" data-precio="$330.00 MXN">
                <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSI1pfrlH3cD5jvxsS8GZ_XNLbYd_OVvo_-r3XLrrWHoSbv1xzx71C9MkfMZm5oCVOtSgWPl_-PIWZ8h13BpZS9yydhlcCoE11yg59rxCUwpmuSJpuHs1GLIA&usqp=CAc" alt="Tease Me Palette">
                <div class="nombre-producto">Tease Me Eyeshadow Palette</div>
                <div class="descripcion-corta">Paleta de 18 tonos cálidos</div>
                <div class="precio-producto">$330.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Alicia Eyeshadow Palette" data-precio="$380.00 MXN">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRicEiQX4q-poX9h6c6hwSapEctIN9wNHBbaEp3TTTPsQ&s=10" alt="Alicia Palette">
                <div class="nombre-producto">Alicia Eyeshadow Palette</div>
                <div class="descripcion-corta">Paleta de 35 sombras pigmentadas</div>
                <div class="precio-producto">$380.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Poreless Face Primer" data-precio="$155.00 MXN">
                <img src="https://donjuan.mx/cdn/shop/files/PRIMER-BEAUTY-CREATIONS-P-POROS-4.jpg?v=1737230054&width=1445" alt="Poreless Face Primer">
                <div class="nombre-producto">Poreless Face Primer</div>
                <div class="descripcion-corta">Primer difuminador de poros</div>
                <div class="precio-producto">$155.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Longwear Matte Lip Gloss" data-precio="$115.00 MXN">
                <img src="https://http2.mlstatic.com/D_Q_NP_2X_949221-MLM117214985177_092026-P.webp" alt="Matte Lip Gloss">
                <div class="nombre-producto">Longwear Matte Lip Gloss</div>
                <div class="descripcion-corta">Labial líquido mate intransferible</div>
                <div class="precio-producto">$115.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Gel Eyeliner Black" data-precio="$110.00 MXN">
                <img src="https://www.bellezaalmayoreo.com/cdn/shop/files/1080x1080-Photoroom_45.webp?v=1782241621" alt="Gel Eyeliner Black">
                <div class="nombre-producto">Gel Eyeliner Black</div>
                <div class="descripcion-corta">Delineador en tarro a prueba de agua</div>
                <div class="precio-producto">$110.00 MXN</div>
            </div>
            <div class="tarjeta-producto" data-nombre="Lash Boost Mascara" data-precio="$140.00 MXN">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/PINK_BOX.jpg?v=1779302588" alt="Lash Boost Mascara">
                <div class="nombre-producto">Lash Boost Mascara</div>
                <div class="descripcion-corta">Máscara efecto pestañas postizas</div>
                <div class="precio-producto">$140.00 MXN</div>
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