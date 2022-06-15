<?php

$title = 'Home';
require 'templates/head.php';

?>
<link rel="stylesheet" href="<?php echo SERVER_NAME ?>view/style/home.css">
</head>

<body>
    <div class="content-index">
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/hablando.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/logo escuela 2020 slider.png" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/libros.jpg" class="d-block" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="./img/logoescuelaweb2.png" alt="..." width="50" height="55"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="page" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item dropdown nav-link px-0 me-3">
                            <a role="button" data-bs-toggle="dropdown" href="#" class="dropdown-toggle text-decoration-none link-light">Acceso</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" aria-current="page" href="acceso/alumno.html">Alumnos</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="acceso/profesor.html">Profesores</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="Registro/Usuario.html">No estoy registrado</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-link px-0 me-2">
                            <a role="button" data-bs-toggle="dropdown" href="#" class="dropdown-toggle text-decoration-none link-light">Cursos</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" aria-current="page" href="#">Alemán</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="#">Árabe</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="#">Español</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="#">Frances</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="#">Inglés</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="#">Ruso</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Matricula</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Sobre nosotros</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control " type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="input-group-text bi bi-search bg-body" type="submit"></button>
                    </form>
                </div>
            </div>
        </nav>
        <main>
            <div class="m-4 mt-5 text-center">
                <h1 class="h1 fw-bold">École de langues Ammari</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis nisi similique blanditiis consequuntur, earum voluptas? Incidunt natus minus obcaecati sed eum, libero reprehenderit perspiciatis unde ipsum accusamus in dicta ratione.</p>
            </div>
            <div class="languages-cards">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 align-items-stretch g-4 py-5">
                    <div class="col">
                        <a class="link-dark text-decoration-none" href="">
                            <div class="card card-cover h-100 overflow-hidden card1">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 fw-bold">Español</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="link-dark text-decoration-none" href="">
                            <div class="card card-cover h-100 overflow-hidden card2">
                                <div class="d-flex flex-column h-100 p-5 pb-3  text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 fw-bold">Inglés</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="link-dark text-decoration-none" href="">
                            <div class="card card-cover h-100 overflow-hidden card3">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 fw-bold">Francés</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="link-dark text-decoration-none" href="">
                            <div class="card card-cover h-100 overflow-hidden card4">
                                <div class="d-flex flex-column h-100 p-5 pb-3  text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 fw-bold">Ruso</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="link-dark text-decoration-none" href="">
                            <div class="card card-cover h-100 overflow-hidden card5">
                                <div class="d-flex flex-column h-100 p-5 pb-3  text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 fw-bold">Alemán</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="link-dark text-decoration-none" href="">
                            <div class="card card-cover h-100 overflow-hidden text-light card6">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 fw-bold">Árabe</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
        <?php
        
        include_once 'templates/footer.php';
        
        ?>
    </div>
</body>