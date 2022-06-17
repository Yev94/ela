<?php

$title = 'Login Admin';
include './view/templates/head.php';
?>
</head>

<!-- Create contact form -->
<body>
    <?php
    
    include './view/templates/nav.php';
    
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1> <?php echo $title;?> </h1>
                <form action="/ela/admin" method="post">
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
                    <button type="submit" class="btn btn-primary my-2">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
    include './view/templates/footer.php';
?>