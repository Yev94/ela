<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo DOMAIN ?>"><img src="<?php echo DOMAIN ?>img/logoescuelaweb2.png" alt="..." width="50" height="55"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarElaToggle" aria-controls="navbarElaToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarElaToggle">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-2">
                    <a class="nav-link active" aria-current="page" href="<?php echo DOMAIN ?>">Inicio</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link active" href="<?php echo DOMAIN ?>login">Acceso</a>
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
                <?php
                //Defined in src/controller/login_admin_controller.php->executePost()
                $userSession = new UserSession();
                $userRole = $userSession->getUserRole();
                $user = ['1', '2', '3'];
                $checkValidUser = false;
                foreach ($user as $user) {
                    if ($userRole == $user) {
                        $checkValidUser = true;
                    }
                }
                if ($checkValidUser) {
                    if ($_SERVER['REQUEST_URI'] !== '/ela/panel') {
                        echo '<li class="nav-item">
                                <a class="nav-link active" href="' . DOMAIN . 'panel">Panel</a>
                            </li>';
                    }
                    echo '<li class="nav-item">
                                <a class="nav-link active text-decoration-underline" href="' . DOMAIN . 'logout">Cerrar sesión</a>
                            </li>';
                }

                ?>
            </ul>
            <form class="d-flex">
                <input class="form-control " type="search" placeholder="Buscar..." aria-label="Search">
                <button class="input-group-text bi bi-search bg-body" type="submit"></button>
            </form>
        </div>
    </div>
</nav>