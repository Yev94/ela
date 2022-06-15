<?php
$title = 'Usuarios';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script defer type="module" src="./client/js/main.js"></script>
    <link rel="stylesheet" href="./client/style/main.css?Version: 1.0.1">
    <link rel="stylesheet" href="./client/style/scrollbar.css">
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <?php

    // require_once 'Controller/users_controller.php';
    // //Al pulsar cualquier botón de acción pasamos por la URL el método que queremos ejecutar
    // $metodo = $_GET['m'] ?? '';
    // //Si existe el método dentro clase, lo ejecuta, sino, muestra el formulario
    // if (method_exists('Users_Controller', $metodo)):
    //     Users_Controller::{$metodo}();
    // else :
    //     Users_Controller::index();
    // endif;

    // 
    ?>

    <body>
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
                                <th>Nombre</th>
                                <th>Apellidos</th>
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
    </body>

</html>
</body>

</html>