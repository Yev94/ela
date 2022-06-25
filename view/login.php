<?php

$title = 'Login Admin';
include './view/templates/head.php';
?>
<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/login.css">
<script defer type="module" src="<?php echo DOMAIN ?>view/js/login.js"></script>
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
                            <p data-toggle="tab" id="tab-student" class="nav-link">Alumno</p>
                        </li>
                        <li class="nav-item">
                            <p data-toggle="tab" id="tab-teacher" class="nav-link active">Profesor</p>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <h3 id="login-title" class="register-heading my-3 justify-content-center text-center">Iniciar sesión como profesor 👨🏻‍🏫</h3>
                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <div class="col-md-5">
                                            <?php
                                            if (isset($errorLogin)) {
                                                echo $errorLogin;
                                            }
                                            ?>
                                    <form class="mt-3" action="<?php echo DOMAIN ?>login" method="post">
                                        <div class="form-floating">
                                            <input type="text" name="user" id="user" class="form-control" value="" placeholder="Usuario" required>
                                            <label for="user"><span class="text-muted">Usuario</span></label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password" id="password" value="" class="form-control" placeholder="Contraseña" required>
                                            <label for="password"><span class="text-muted">Contraseña</span></label>
                                        </div>
                                        <input id="input-role" type="hidden" name="role" value="2">
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