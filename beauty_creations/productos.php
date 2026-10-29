<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = mysqli_real_escape_string($conexion, $_POST['producto_nombre']);
    $precio = mysqli_real_escape_string($conexion, $_POST['producto_precio']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $cantidad = (int)$_POST['cantidad'];
    $pago = mysqli_real_escape_string($conexion, $_POST['pago']);

    $sql = "INSERT INTO pedidos (producto, precio, nombre_cliente, direccion, cantidad, metodo_pago) 
            VALUES ('$producto', '$precio', '$nombre', '$direccion', $cantidad, '$pago')";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('¡Pedido realizado con éxito! Gracias por tu compra.'); window.location.href='productos.php';</script>";
    } else {
        echo "<script>alert('Error al guardar el pedido: " . $conexion->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* ESTILOS EXISTENTES */
        header {
            background-color: #FFB6C1;
            padding: 25px;
            color: white;
            display: table;
            width: 100%;
            box-sizing: border-box;
        }

        header h1 { 
            margin: 0; 
            font-size: 100px; 
            text-transform: uppercase;
            letter-spacing: 40px;
        }

        .header-col {
            display: table-cell;
            vertical-align: middle;
        }

        .col-titulo { 
            width: 50%; 
            text-align: center; 
        }

        nav { background-color: #90EE90; padding: 10px 0; }
        nav ul { list-style-type: none; margin: 0; padding: 0; text-align: center; }
        nav ul li { display: inline; margin: 0 20px; }
        nav ul li a {
            color: black;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }
        nav ul li a.activo {
            text-decoration: underline;
        }

        /* SECCIÓN DE PRODUCTOS CON NUEVO COLOR DE FONDO */
        .seccion-productos {
            background-color: #FFE4C4;
            padding: 40px 20px;
            min-height: 500px;
        }

        .titulo-catalogo {
            text-align: center;
            color: #d81b60; /* Tono magenta suave para resaltar */
            font-size: 32px;
            margin-bottom: 30px;
            font-family: Arial, sans-serif;
        }

        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Tarjetas de producto en color grisecito muy claro */
        .tarjeta-producto {
            background-color: #f8f9fa; /* Grisecito muy claro */
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, background-color 0.2s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .tarjeta-producto:hover {
            transform: translateY(-5px);
            background-color: #f1f3f5; /* Gris un poco más marcado al pasar el mouse */
        }

        .tarjeta-producto img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #e9ecef;
        }

        .nombre-producto {
            color: #333333;
            font-size: 18px;
            font-weight: bold;
            margin: 8px 0 4px 0;
            font-family: Arial, sans-serif;
        }

        .descripcion-corta {
            color: #6c757d;
            font-size: 14px;
            margin: 0 0 8px 0;
            font-style: italic;
        }

        .precio-producto {
            color: #d81b60;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .link-detalles {
            color: #9370DB; /* Púrpura suave en concordancia con tus estilos */
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
        }

        /* FORMULARIO VENTANA MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
        }

        .modal-contenido {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 450px;
            position: relative;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .cerrar-modal {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #888;
        }

        .modal-contenido h2 {
            margin-top: 0;
            color: #333;
            font-size: 22px;
        }

        .modal-contenido label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .modal-contenido input, .modal-contenido select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-comprar {
            background-color: #FFB6C1;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-comprar:hover {
            background-color: #ff9eaa;
        }

        /* FOOTER EXISTENTE */
        footer {
            background-color: #7FFFD4;
            padding: 30px;
            text-align: center;
            color: black;
            font-size: 20px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
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
            <li><a href="productos.php" class="activo">Productos</a></li>
            <li><a href="sesion.php">Iniciar Sesion</a></li>
            <li><a href="registrar.php">Registrarme</a></li>
        </ul>
    </nav>

    <!-- CUERPO PRINCIPAL: SECCIÓN DE PRODUCTOS -->
    <main class="seccion-productos">
        <h2 class="titulo-catalogo">Catálogo de Maquillaje</h2>

        <div class="grid-productos">

            <!-- Producto 1 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Paleta Tease Me', '$320 MXN')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4hd0nqyD29rUjpS1w0zbk3nO0ppVTtKqVZoXJmXR5mQ&s=10" alt="Paleta Tease Me">
                <div class="nombre-producto">Tease Me</div>
                <div class="descripcion-corta">Sombra de ojos</div>
                <div class="precio-producto">$320 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 2 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Paleta Alicia', '$350 MXN')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZ4IQYKFqkTEO7y0DVZd6SYFSia413QYQBvcHBUVUXZ_CewwCi2K6H1k4&s=10" alt="Paleta Alicia">
                <div class="nombre-producto">Alicia</div>
                <div class="descripcion-corta">Paleta de sombras</div>
                <div class="precio-producto">$350 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 3 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Base Flawless Stay', '$280 MXN')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNVnKrnM7iCVToJk7X7SJYu-NClO7AMYVh8NmtkLXj_w&s=10" alt="Base Flawless Stay">
                <div class="nombre-producto">Flawless Stay</div>
                <div class="descripcion-corta">Base líquida mate</div>
                <div class="precio-producto">$280 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 4 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Corrector Flawless', '$150 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/corrector.jpg?v=1753388872&width=320" alt="Corrector Flawless">
                <div class="nombre-producto">Flawless Concealer</div>
                <div class="descripcion-corta">Corrector alta cobertura</div>
                <div class="precio-producto">$150 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 5 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Polvo Traslúcido', '$190 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-bye-filter-polvo-fijador-cosmetics-bfp01-340036.webp?v=1753389323" alt="Polvo Traslúcido">
                <div class="nombre-producto">Setting Powder</div>
                <div class="descripcion-corta">Polvo fijador suelto</div>
                <div class="precio-producto">$190 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 6 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Fijador de Maquillaje', '$180 MXN')">
                <img src="https://bellisima.mx/cdn/shop/files/NYXLINGERIELIQUIDLIPSTICK-BEDTIMEFLIRT-2023-08-01T125805.554_1200x.png?v=1690916307" alt="Fijador de Maquillaje">
                <div class="nombre-producto">Setting Spray</div>
                <div class="descripcion-corta">Fijador hidratante duradero</div>
                <div class="precio-producto">$180 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 7 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Primer Facial', '$160 MXN')">
                <img src="https://m.media-amazon.com/images/I/51eHYT66tfL._AC_UF1000,1000_QL80_.jpg" alt="Primer Facial">
                <div class="nombre-producto">Poreless Primer</div>
                <div class="descripcion-corta">Prebase minimizadora poros</div>
                <div class="precio-producto">$160 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 8 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Labial Matte Gloss', '$120 MXN')">
                <img src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSdajy3bJutsRetdQxWJpUaCwwuXbnP4rcJFYCbbXf7IBHFmCo7JQnxU8U2UBjBuuXOBPOg2rlSMUYyJD_PmI_Vqu7t3lbrY4wBvLslK3fMcddwL1fqcZ-0_W3yLjJDf6BvT-lmMJnqIg&usqp=CAc" alt="Labial Matte Gloss">
                <div class="nombre-producto">Matte Gloss</div>
                <div class="descripcion-corta">Labial líquido mate</div>
                <div class="precio-producto">$120 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 9 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Delineador Gel', '$110 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-pastel-please-delineador-en-gel-pot-cosmetics-elgpp-5-842448.jpg?v=1739229402" alt="Delineador Gel">
                <div class="nombre-producto">Gel Eyeliner</div>
                <div class="descripcion-corta">Delineador de ojos</div>
                <div class="precio-producto">$110 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 10 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Máscara de Pestañas', '$140 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/PINK_BOX.jpg?v=1779302588" alt="Máscara de Pestañas">
                <div class="nombre-producto">Lash Boost</div>
                <div class="descripcion-corta">Rímel volumen extremo</div>
                <div class="precio-producto">$140 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 11 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Rubor Floral', '$165 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/bcc-backup-beauty-creations-floral-bloom-blush-paleta-de-rubores-cosmetics-bf01-152807.jpg?v=1739234246" alt="Rubor Floral">
                <div class="nombre-producto">Floral Blush</div>
                <div class="descripcion-corta">Rubor en compacto</div>
                <div class="precio-producto">$165 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 12 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Iluminador Glow', '$175 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/FINAL-FINISH-OPEN-COMPACT-FLASHY.png?v=1776388879" alt="Iluminador Glow">
                <div class="nombre-producto">Glow Highlighter</div>
                <div class="descripcion-corta">Iluminador en polvo</div>
                <div class="precio-producto">$175 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 13 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Tinta de Labios', '$130 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/TERRACOTTA-TEASE.jpg?v=1770159282" alt="Tinta de Labios">
                <div class="nombre-producto">Lip Tint</div>
                <div class="descripcion-corta">Tinta ligera duradera</div>
                <div class="precio-producto">$130 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 14 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Pomada para Cejas', '$135 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-eyebrow-definer-gel-delineador-de-cejas-en-gel-cosmetics-bg06-233544.jpg?v=1753301213" alt="Pomada para Cejas">
                <div class="nombre-producto">Brow Pomade</div>
                <div class="descripcion-corta">Pomada para cejas</div>
                <div class="precio-producto">$135 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

            <!-- Producto 15 -->
            <div class="tarjeta-producto" onclick="abrirFormulario('Set de Brochas', '$420 MXN')">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/bcc-backup-beauty-creations-set-de-brochas-nude-x-12-pzas-set-de-brochas-de-12-piezas-bs12nx-695567.jpg?v=1723576342" alt="Set de Brochas">
                <div class="nombre-producto">Brush Set</div>
                <div class="descripcion-corta">Juego de brochas</div>
                <div class="precio-producto">$420 MXN</div>
                <span class="link-detalles">Haz clic para comprar</span>
            </div>

        </div>
    </main>

    <!-- FORMULARIO DE COMPRA -->
    <div id="modalCompra" class="modal">
        <div class="modal-contenido">
            <span class="cerrar-modal" onclick="cerrarFormulario()">&times;</span>
            <h2>Formulario de Compra</h2>
            <p>Producto seleccionado: <b id="productoNombre" style="color: #d81b60;"></b></p>
            <p>Precio: <b id="productoPrecio"></b></p>
            
            <form action="productos.php" method="POST">
    <!-- Campos ocultos para enviar nombre y precio del producto -->
    <input type="hidden" id="inputProductoNombre" name="producto_nombre">
    <input type="hidden" id="inputProductoPrecio" name="producto_precio">

    <label for="nombre">Nombre completo:</label>
    <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">

    <label for="direccion">Dirección de envío:</label>
    <input type="text" id="direccion" name="direccion" required placeholder="Calle, número y colonia">

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" min="1" value="1" required>

    <label for="pago">Método de pago:</label>
    <select id="pago" name="pago">
        <option value="Tarjeta">Tarjeta de Crédito / Débito</option>
        <option value="OXXO">Pago en OXXO</option>
        <option value="Transferencia">Transferencia bancaria</option>
    </select>

    <button type="submit" class="btn-comprar">Confirmar Pedido</button>
</form>
        </div>
    </div>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>

    <!-- SCRIPT PARA EL FUNCIONAMIENTO DEL FORMULARIO MODAL -->
    <script>
        function abrirFormulario(nombre, precio) {
    document.getElementById('productoNombre').innerText = nombre;
    document.getElementById('productoPrecio').innerText = precio;
    
    // Asignar a inputs ocultos
    document.getElementById('inputProductoNombre').value = nombre;
    document.getElementById('inputProductoPrecio').value = precio;
    
    document.getElementById('modalCompra').style.display = 'flex';
}

        function cerrarFormulario() {
            document.getElementById('modalCompra').style.display = 'none';
        }

        function realizarCompra(event) {
            event.preventDefault();
            alert('¡Gracias por tu compra! Tu pedido de ' + document.getElementById('productoNombre').innerText + ' ha sido procesado.');
            cerrarFormulario();
        }

        window.onclick = function(event) {
            var modal = document.getElementById('modalCompra');
            if (event.target == modal) {
                cerrarFormulario();
            }
        }
    </script>

</body>
</html>