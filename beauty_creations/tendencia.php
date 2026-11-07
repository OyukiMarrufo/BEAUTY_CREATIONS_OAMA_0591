<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Tendencia</title>
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
        nav ul.menu-centrado li { margin: 0 12px; }
        nav ul.menu-derecha { position: absolute; right: 25px; }
        nav ul.menu-derecha li { margin-left: 15px; }
        nav ul li a { color: #111; text-decoration: none; font-weight: bold; font-size: 18px; padding: 8px 16px; border-radius: 20px; transition: all 0.3s ease; }
        nav ul li a:hover, nav ul li a.activo { background-color: rgba(255, 255, 255, 0.6); color: #d81b60; }
        .btn-icon-sesion { font-size: 22px; color: black; display: flex; align-items: center; justify-content: center; }

        .seccion-productos { background-color: #FFE4C4; padding: 50px 20px; min-height: 500px; }
        .titulo-catalogo { text-align: center; color: #d81b60; font-size: 32px; margin-bottom: 35px; text-shadow: 1px 1px 2px rgba(0,0,0,0.05); }
        .grid-productos { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 25px; max-width: 1200px; margin: 0 auto; }

        .tarjeta-producto { background-color: #ffffff; border: none; border-radius: 16px; padding: 18px; text-align: center; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06); display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .tarjeta-producto:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12); }
        .tarjeta-producto img { width: 100%; height: 230px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; background-color: #f8f9fa; }
        .nombre-producto { color: #333333; font-size: 18px; font-weight: bold; margin: 8px 0 4px 0; }
        .descripcion-corta { color: #6c757d; font-size: 14px; margin: 0 0 8px 0; font-style: italic; }
        .precio-producto { color: #d81b60; font-size: 18px; font-weight: bold; margin-bottom: 8px; }

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
        <ul class="menu-centrado">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="nuevo.php">Nuevo</a></li>
            <li><a href="collabs.php">Collabs</a></li>
            <li><a href="tendencia.php" class="activo">Tendencia</a></li>
        </ul>
        <ul class="menu-derecha">
            <li><a href="registrar.php">Registrarme</a></li>
            <li><a href="sesion.php" title="Iniciar Sesión" class="btn-icon-sesion"><i class="fa-solid fa-user"></i></a></li>
        </ul>
    </nav>

    <main class="seccion-productos">
        <h2 class="titulo-catalogo">Lo Más Viral y En Tendencia</h2>

        <div class="grid-productos">
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-bye-filter-polvo-fijador-cosmetics-bfp01-340036.webp?v=1753389323" alt="Bye Filter Loose Powder">
                <div class="nombre-producto">Bye Filter Translucent Powder</div>
                <div class="descripcion-corta">Polvo traslúcido viral acabado filtro</div>
                <div class="precio-producto">$190.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/TERRACOTTA-TEASE.jpg?v=1770159282" alt="Juicy Lip Oil Pink">
                <div class="nombre-producto">Juicy Lip Oil Gloss</div>
                <div class="descripcion-corta">Aceite de labios hidratante viral en TikTok</div>
                <div class="precio-producto">$139.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/CORAL-QUARTZ.jpg?v=1752537838" alt="Liquid Blush Crush">
                <div class="nombre-producto">Blush Crush Liquid Blush</div>
                <div class="descripcion-corta">Rubor líquido super difuminable</div>
                <div class="precio-producto">$159.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://http2.mlstatic.com/D_NQ_NP_2X_869245-MLA79530538753_092024-F.webp" alt="Brow Tamer Wax">
                <div class="nombre-producto">Brow Tamer Styling Wax</div>
                <div class="descripcion-corta">Cera fijadora para cejas orgánicas</div>
                <div class="precio-producto">$135.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/FOUNDATION4.jpg?v=1749683327" alt="Flawless Stay Matte">
                <div class="nombre-producto">Flawless Stay Matte Foundation</div>
                <div class="descripcion-corta">Base fluida efecto segunda piel</div>
                <div class="precio-producto">$270.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-body-glow-aceite-de-brillo-corporal-cosmetics-gbo-3-583914.webp?v=1723538106&width=1200" alt="Body Glow Drops">
                <div class="nombre-producto">Shimmer Body Glow Drops</div>
                <div class="descripcion-corta">Gotas iluminadoras para rostro y cuerpo</div>
                <div class="precio-producto">$189.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-cosmetics-mx-beauty-creations-lip-gloss-voluminizador-plump-pout-bundle-cosmetics-lpp-pr-334088.jpg?v=1723570058" alt="Plumping Lip Gloss">
                <div class="nombre-producto">Extreme Plumping Lip Gloss</div>
                <div class="descripcion-corta">Brillo voluminizador de labios instantáneo</div>
                <div class="precio-producto">$145.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/PINK_BOX.jpg?v=1779302588" alt="Lash Extension Effect">
                <div class="nombre-producto">Lash Extension Effect Mascara</div>
                <div class="descripcion-corta">Rímel alargador con microfibras</div>
                <div class="precio-producto">$140.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://shopcosmeticsandmore.com/cdn/shop/files/PHOTO-2026-10-14-11-34-32.jpg?v=1792018617&width=900" alt="Matte Setting Spray">
                <div class="nombre-producto">Ultra Matte Setting Mist</div>
                <div class="descripcion-corta">Fijador mate duración 16 horas</div>
                <div class="precio-producto">$165.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-pastel-please-delineador-en-gel-pot-cosmetics-elgpp-5-842448.jpg?v=1739229402" alt="Graphic Water Liner">
                <div class="nombre-producto">Graphic Water Activated Liner</div>
                <div class="descripcion-corta">Delineador de agua para arte facial</div>
                <div class="precio-producto">$120.00 MXN</div>
            </div>
        </div>
    </main>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>
</body>
</html>