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
    <div class="container d-flex align-items-center justify-content-center">
        <div class="page-login">
            <span class="video-login">
                <video loop="loop" autoplay="" muted="" preload="none" src="<?php echo DOMAIN ?>img/castillo.mp4" style="width:100%">
                    <source type="video/webm" src="<?php echo DOMAIN ?>img/castillo.mp4">
                </video>
            </span>
            <div class="content-login">
                <div class="row justify-content-center">
                    <div class="col-md-12 p-5">
                        <div class="d-flex flex-column justify-content-center">
                            <img class="mb-2 align-self-center" src="/ela/img/logo-w200.png" alt="...">
                            <h1> <?php echo $title; ?> </h1>
                        </div>
                        <form action="<?php echo DOMAIN ?>admin" method="post">
                            <div class="form-group">
                                <?php
                                if (isset($errorLogin)) {
                                    echo $errorLogin;
                                }
                                ?>
                                <label for="user">Usuario</label>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Insertar Nombre">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Insertar Contraseña">
                            </div>
                            <input type="hidden" name="rol" value="3">
                            <button type="submit" class="btn btn-primary my-2">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './view/templates/footer.php';
    ?>
</body>