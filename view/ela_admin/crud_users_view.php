<?php
$title = 'CRUD Usuarios';
include './view/templates/head.php';
require 'model/api_users_model.php';
//Defined in src/controller/login_admin_controller.php->executePost()
if (isset($_SESSION['user']["userName"])) {
    $name = $_SESSION['user']['userName'];
} else {
    $name = 'Guest';
}


?>

<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/ela_admin.css">
<script defer type="module" src="<?php echo DOMAIN ?>view/js/bootstrap.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/crud.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/main_admin_users.js"></script>
</head>

<body>
    <?php

    include './view/templates/nav.php';
    echo '<h1 class="text-center"> Bienvenido ' . $name . '</h1>';

    ?>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Vertically centered modal -->
            <div class="modal fade" id="modalUserInfo" tabindex="-1" aria-labelledby="modalUserInfoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-success" id="modalUserInfoLabel">Editar Información Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form readonly id="form-update" action="javascript:void(0);" method="post">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="id-update" class="form-label">ID:</label>
                                    <input required type="text" name="id-update" id="id-update" class="form-control" placeholder="ID">
                                </div>
                                <div class="mb-3">
                                    <label for="name-update" class="form-label">Nombre:</label>
                                    <input required type="text" name="name-update" id="name-update" class="form-control" placeholder="Nombre del usuarios">
                                </div>
                                <div class="mb-3">
                                    <label for="last-name-update" class="form-label">Apellidos:</label>
                                    <input type="text" name="last-name-update" id="last-name-update" class="form-control" placeholder="Apellidos">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="email" class="form-label">Correo:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo del usuarios">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-success ">
                        Insertar Usuarios
                    </div>
                    <div class="card-body">
                        <form id="form" action="javascript:void(0);" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input required type="text" name="name" id="name" class="form-control" placeholder="Nombre del usuarios">
                            </div>
                            <div class="mb-3">
                                <label for="last-name" class="form-label">Apellidos:</label>
                                <input required type="text" name="last-name" id="last-name" class="form-control" placeholder="Apellidos">
                            </div>
                            <!-- <div class="mb-3">
                                    <label for="email" class="form-label">Correo:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo del usuarios">
                                </div> -->

                            <button type="submit" class="btn btn-success">Agregar usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-4">
            <h3 class="text-success">Lista de Usuarios</h3>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>DNI</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="users">
                        <?php
                        // Managed By Client Side
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include './view/templates/footer.php';
    ?>
</body>