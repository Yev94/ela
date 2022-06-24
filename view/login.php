<?php

$title = 'Login Admin';
include './view/templates/head.php';
?>
<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/login.css">
</head>

<!-- Create contact form -->

<body>
    <?php

    include './view/templates/nav.php';

    ?>

    <main>
        <div class="container my-5 register">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link" href="alumno.html">Alumno</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="/acceso/profesor.html">Profesor</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <h3 class="register-heading my-3 justify-content-center text-center">Iniciar sesión como profesor👨🏻‍🏫</h3>
                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <div class="col-md-5">
                                    <form class="needs-validation mt-3" novalidate>
                                        <div class="form-floating">
                                            <input type="text" name="username" id="username" class="form-control" value="" placeholder="Usuario" required>
                                            <label for="username"><span class="text-muted">Usuario</span></label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password" id="password" value="" class="form-control" placeholder="Contraseña" required>
                                            <label for="password"><span class="text-muted">Contraseña</span></label>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-block mt-3" id="loginbtn">Acceder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include './view/templates/footer.php';
    ?>
</body>