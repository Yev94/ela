<?php
$title = 'CRUD Usuarios';
include './view/templates/head.php';
require 'model/api_users_model.php';
$sessionUser = new UserSession();
$userRole = $sessionUser->getUserRole();
$userName = $sessionUser->getUserName();
//Defined in src/controller/login_admin_controller.php->executePost()
if ($userRole == '3') {
    $name = $userName;
    $roleName = 'Administrador';
} else {
    $name = 'Invitado';
}

?>

<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/home.css">
<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/ela_admin.css">
</head>

<body>
    <?php

    include './view/templates/nav.php';
    echo '<h1 class="pt-4" class="text-center"> Bienvenido ' . $name . '</h1>';
    echo '<h2 class="pt-4" class="text-center"> Estás navegando como ' . $roleName . '</h2>';

    ?>
    <h2 class="text-center">Tu Panel:</h2>
    <div class="container">
        <div class="languages-cards">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 align-items-stretch g-4">
                <div class="col">
                    <?php
                    if ($userRole == '3') {
                        echo '<a class="link-dark text-decoration-none" href="' . DOMAIN . 'panel?db=users">
                        </li>';
                    } else {
                        echo '<a class="link-dark text-decoration-none" href="' . DOMAIN . '">
                        </li>';
                    }
                    ?>
                    <div class="card card-cover overflow-hidden align-self-center card1">
                        <div class="d-flex flex-column h-100 p-2 pt-3 align-self-center text-shadow-1">
                            <img src="<?php echo DOMAIN ?>/img/triangulo.png" alt="" width="120px">
                            <h4 class="pt-2 display-6 fw-bold text-center">Usuarios</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col">
                <?php
                    if ($userRole == '3') {
                        echo '<a class="link-dark text-decoration-none" href="' . DOMAIN . 'panel?db=courses">
                        </li>';
                    } else {
                        echo '<a class="link-dark text-decoration-none" href="' . DOMAIN . '">
                        </li>';
                    }
                    ?>
                        <div class="card card-cover overflow-hidden align-self-center card1">
                            <div class="d-flex flex-column h-100 p-2 pt-3 align-self-center text-shadow-1">
                                <img src="<?php echo DOMAIN ?>/img/escuela.png" alt="" width="120px">
                                <h4 class="pt-2 display-6 fw-bold text-center">Cursos</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="link-dark text-decoration-none" href="">
                        <div class="card card-cover overflow-hidden align-self-center card1">
                            <div class="d-flex flex-column h-100 p-2 pt-3 align-self-center text-shadow-1">
                                <img src="<?php echo DOMAIN ?>/img/banca-por-internet.png" alt="" width="120px">
                                <h4 class="pt-2 display-6 fw-bold text-center">Cuentas</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './view/templates/footer.php';
    ?>
</body>