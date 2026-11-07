<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Beauty Creations - Collabs</title>
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
            <li><a href="collabs.php" class="activo">Collabs</a></li>
            <li><a href="tendencia.php">Tendencia</a></li>
        </ul>
        <ul class="menu-derecha">
            <li><a href="registrar.php">Registrarme</a></li>
            <li><a href="sesion.php" title="Iniciar Sesión" class="btn-icon-sesion"><i class="fa-solid fa-user"></i></a></li>
        </ul>
    </nav>

    <main class="seccion-productos">
        <h2 class="titulo-catalogo">Colecciones y Colaboraciones Especiales</h2>

        <div class="grid-productos">
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/palette_220d84ef-1aa5-481a-8002-8c1f2727ad2f.jpg?v=1763589012" alt="Rosy McMichael Vol. 2">
                <div class="nombre-producto">Rosy McMichael Vol. 2 Palette</div>
                <div class="descripcion-corta">Colección en colaboración oficial</div>
                <div class="precio-producto">$450.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/beauty-creations-mx-beauty-creations-x-my-little-pony-head-in-the-clouds-shadow-and-face-palette-mlp-sfp-175087.jpg?v=1723532885" alt="My Little Pony Palette">
                <div class="nombre-producto">My Little Pony x Beauty Creations</div>
                <div class="descripcion-corta">Paleta de sombras multicolor</div>
                <div class="precio-producto">$390.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://m.media-amazon.com/images/I/61C3kOjaBgL._AC_UF350,350_QL80_.jpg" alt="My Little Pony Lip Gloss Trio">
                <div class="nombre-producto">My Little Pony Lip Trio</div>
                <div class="descripcion-corta">Set de 3 brillos de labios</div>
                <div class="precio-producto">$260.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE-dc_O0kmywT_1xj9lwhPjilOPWDnXVfbsGpsnjAPfg&s=10" alt="Barbie Brush Set">
                <div class="nombre-producto">Barbie™ x Beauty Creations Brushes</div>
                <div class="descripcion-corta">Set de brochas edición especial</div>
                <div class="precio-producto">$480.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdnp0bWJ1Uy--4e-6G4gqdc7WdTkN4uIo1cZ_63ywWVGyNA6T0ajSDEb0&s=10" alt="Barbie Lip Kit">
                <div class="nombre-producto">Barbie™ Lip Kit Duo</div>
                <div class="descripcion-corta">Dúo de labial y delineador rosa</div>
                <div class="precio-producto">$220.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/bcc-backup-beauty-creations-kit-de-labios-the-not-so-classic-kit-rosy-mcmichael-x-beauty-creations-vol-2-cosmetics-rmv2ls1-608064.jpg?v=1723551801" alt="Rosy McMichael Lip Kit">
                <div class="nombre-producto">Rosy McMichael Nude Lip Trio</div>
                <div class="descripcion-corta">Combo labial mate + delineador + gloss</div>
                <div class="precio-producto">$290.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/Shadow-Palette-Girls-Nite-Out-Collection-Bratz.jpg?v=1757109209" alt="Bratz Palette">
                <div class="nombre-producto">Bratz™ x Beauty Creations Palette</div>
                <div class="descripcion-corta">Paleta de tonos vibrantes 2000s</div>
                <div class="precio-producto">$420.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/Yasmin-Liquid-Liner.jpg?v=1757109110&width=850" alt="Bratz Eyeliner Set">
                <div class="nombre-producto">Bratz™ Liquid Eyeliner Set</div>
                <div class="descripcion-corta">Delineadores metálicos coleccionables</div>
                <div class="precio-producto">$240.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://beautycreationscosmetics.com.mx/cdn/shop/files/WhatsAppImage2025-04-10at5.35.57PM_1.jpg?v=1744329412" alt="Rosy Face Trio">
                <div class="nombre-producto">Rosy McMichael Face Palette</div>
                <div class="descripcion-corta">Contorno, rubor e iluminador trío</div>
                <div class="precio-producto">$810.00 MXN</div>
            </div>
            <div class="tarjeta-producto">
                <img src="https://bellabeautyshopstore.com/cdn/shop/products/BarbieHandMirror2_1445x.png?v=1620941017" alt="Barbie Collector Mirror">
                <div class="nombre-producto">Barbie™ Handheld Mirror</div>
                <div class="descripcion-corta">Espejo de mano de edición limitada</div>
                <div class="precio-producto">$180.00 MXN</div>
            </div>
        </div>
    </main>

    <footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>
</body>
</html>