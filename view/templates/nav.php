<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="/ela/"><img src="./img/logoescuelaweb2.png" alt="..." width="50" height="55"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarElaToggle" aria-controls="navbarElaToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarElaToggle">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-2">
                    <a class="nav-link active" aria-current="page" href="/ela/">Inicio</a>
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
                <?php

                if (isset($_SESSION['user'])) {
                    if($_SERVER['REQUEST_URI'] !== '/ela/admin'){
                        echo '<li class="nav-item">
                            <a class="nav-link active" href="/ela/admin">Admin</a>
                        </li>';
                    }
                    echo '<li class="nav-item">
                            <a class="nav-link active text-decoration-underline" href="/ela/logout">Cerrar sesión</a>
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