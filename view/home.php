<?php

$title = 'Home';
require 'templates/head.php';
?>
<link rel="stylesheet" href="./view/style/home.css">
</head>

<body>
    <div class="content-index">
        <?php

        include 'templates/nav.php';

        ?>
        <header class="my-3">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
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
        <main>
            <div class="my-3 text-center">
                <h1 class="h1 fw-bold">École de Langues Ammari</h1>
                <p class="p-max">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis nisi similique blanditiis consequuntur, earum voluptas? Incidunt natus minus obcaecati sed eum, libero reprehenderit perspiciatis unde ipsum accusamus in dicta ratione.</p>
            </div>
            <div class="languages-cards">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 align-items-stretch g-4">
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