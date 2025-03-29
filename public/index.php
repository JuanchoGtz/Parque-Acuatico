<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Carrusel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
        body {
            font-family: "Montserrat", sans-serif;
            background-color: #F9F9F9;
            text-align: center;
            margin-top: 120px; /* Espacio para la barra fija */
        }
        .top-info {
            background-color: #1d6cd8;
            color: white;
            padding: 15px 0;
            font-size: 18px;
        }
        .navbar {
            background-color: white;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-nav .nav-link {
            color: #888888 !important;
            font-weight: bold;
        }
        .navbar-nav .nav-link:hover{
            color: #1d6cd8 !important;
            font-weight: bold;
        }
        .carousel {
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <!-- Información del Lugar -->
    <div class="top-info">
        <h1>Río Salvaje</h1>
        <p>Dirección: Calle 123, Ciudad, País | Teléfono: +123 456 7890</p>
    </div>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="cambiarPagina('home')">Home | </a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="cambiarPagina('albercas')">Albercas | </a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="cambiarPagina('hospedaje')">Hospedaje | </a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="cambiarPagina('servicios')">Servicios | </a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/login.php" >Registrarse</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido dinámico -->
    <div id="contenido">
        <div id="home">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imgs/Carrusel1.jpg" height="600px" class="d-block w-100" alt="Imagen 1">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/Carrusel2.jpg" height="600px" class="d-block w-100" alt="Imagen 2">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/Carrusel3.jpg" height="600px" class="d-block w-100" alt="Imagen 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>

    <div id="albercas" style="display:none;">
    <h2 class="mt-4">Albercas</h2>
    
    <!-- Primera Sección: Texto Izquierda - Imagen Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Alberca Familiar</h3>
                <p>Disfruta de un espacio seguro y divertido para toda la familia con agua templada y áreas de descanso.</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Alberca-Familiar.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>

    <!-- Segunda Sección: Imagen Izquierda - Texto Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3>Alberca de olas con toboganes</h3>
                <p>Para los amantes de la diversion extrema y los toboganes</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Alberca-Toboganes.jpg" class="img-fluid rounded" alt="Alberca Olímpica">
            </div>
        </div>
    </div>

    <!-- Tercera Sección: Texto Izquierda - Imagen Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Alberca Infantil</h3>
                <p>Espacio diseñado para los más pequeños, con profundidad segura y juegos acuáticos interactivos.</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Alberca-Infantil.jpg" class="img-fluid rounded" alt="Alberca Infantil">
            </div>
        </div>
    </div>

    <!-- Cuarta Sección: Imagen Izquierda - Texto Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3>Lago natural</h3>
                <p>Si te gusta la naturaleza y nadar para que te lleve la corriente este es tu ideal</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Lago-Natural.jpg" class="img-fluid rounded" alt="Alberca Olímpica">
            </div>
        </div>
    </div>
    

</div>


        <div id="hospedaje" style="display:none;">
            <h2 class="mt-4">Hospedaje</h2>
             <!-- Primera Sección: Texto Izquierda - Imagen Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Cabaña 1</h3>
                <p>Ideal para la familia (Maximo 4 personas) </p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Cabaña1.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>
    <!-- Segunda Sección: Imagen Izquierda - Texto Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3>Cabaña 2</h3>
                <p>Ideal para un viaje de Amigos (Maximo 6 personas)</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Cabaña2.jpg" class="img-fluid rounded" alt="Alberca Olímpica">
            </div>
        </div>
    </div>

 <!-- Tercera Sección: Texto Izquierda - Imagen Derecha -->
 <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Áreas de camping</h3>
                <p>Perfecto para Venir a la naturaleza y conocer tu lado natural</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Camping.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>

    </div>

        <div id="servicios" style="display:none;">
            <h2 class="mt-4">Servicios</h2>
           <!-- Primera Sección: Texto Izquierda - Imagen Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Estacionamiento</h3>
                <p>Ideal para la familia (Maximo 4 personas) </p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Estacionamiento.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>
    <!-- Segunda Sección: Imagen Izquierda - Texto Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3>Servicio médico</h3>
                <p>Ideal para un viaje de Amigos (Maximo 6 personas)</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Servicio-Medico.jpg" class="img-fluid rounded" alt="Alberca Olímpica">
            </div>
        </div>
    </div>

 <!-- Tercera Sección: Texto Izquierda - Imagen Derecha -->
 <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Regaderas</h3>
                <p>Perfecto para Venir a la naturaleza y conocer tu lado natural</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Regaderas.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>

    <!-- Cuarta Sección: Imagen Izquierda - Texto Derecha -->
    <div class="container mt-4">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3>Seguridad las 24 Hrs</h3>
                <p>Ideal para un viaje de Amigos (Maximo 6 personas)</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Seguridad.jpg" class="img-fluid rounded" alt="Alberca Olímpica">
            </div>
        </div>
    </div>

    <!-- Quinta Sección: Texto Izquierda - Imagen Derecha -->
 <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Asadores</h3>
                <p>Perfecto para Venir a la naturaleza y conocer tu lado natural</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Asadores.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>

<!-- Sexta Sección: Imagen Izquierda - Texto Derecha -->
<div class="container mt-4">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3>Áreas verdes</h3>
                <p>Ideal para un viaje de Amigos (Maximo 6 personas)</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Areas-Verdes.jpg" class="img-fluid rounded" alt="Alberca Olímpica">
            </div>
        </div>
    </div>

<!-- Septima Sección: Texto Izquierda - Imagen Derecha -->
<div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Renta de casas de campaña</h3>
                <p>Perfecto para Venir a la naturaleza y conocer tu lado natural</p>
            </div>
            <div class="col-md-6">
                <img src="imgs/Camping.jpg" class="img-fluid rounded" alt="Alberca Familiar">
            </div>
        </div>
    </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cambiarPagina(pagina) {
            document.getElementById('home').style.display = 'none';
            document.getElementById('albercas').style.display = 'none';
            document.getElementById('hospedaje').style.display = 'none';
            document.getElementById('servicios').style.display = 'none';
            
            document.getElementById(pagina).style.display = 'block';
        }
    </script>

</body>
</html>
