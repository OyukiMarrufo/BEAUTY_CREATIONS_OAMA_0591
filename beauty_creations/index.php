<!DOCTYPE html>
<html lang="es">
<head>
	<title>Beauty Creations - Inicio</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <li><a href="index.php" class="activo">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="sesion.php">Iniciar Sesion</a></li>
            <li><a href="registrar.php">Registrarme</a></li>
        </ul>
    </nav>

     <section class="contenedor-cuerpo">
        <div class="contenido-flex">
            <!-- Imagen Izquierda -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU4g4NP1p0ss79iFZS0lKvXImTRP-ap2Xs2_a0RDGBUCABc5xF-CamY0hA&s=10" alt="Imagen Principal" class="imagen-centro">
            <article>
                <h1 class="titulo-seccion">"Maquillaje para expresarte a tu manera"</h1>
                <p class="texto-inicio">
                    "Bienvenido a BEAUTY CREATIONS. Maquillaje actual, bonito y versátil para tu día a día. Encuentra las últimas tendencias en maquillaje con envíos a todo el país. ¡Maquillate como eres!"
                </p>
            </article>
        </div>
    </section>

	<footer>
        <p>Nombre completo: Marrufo Alvarado Oyuki Alejandra | No.Control: a.24308051280591 | Semestre: 5to | Grupo: I | Especialidad: Programación</p>
    </footer>
</body>
</html>