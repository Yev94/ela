<?php
require 'model/api_admin_users_model.php';
$title = 'CRUD Usuarios';
include './view/templates/head.php';
?>

<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/ela_admin.css">
<script defer type="module" src="<?php echo DOMAIN ?>view/js/bootstrap.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/api_crud.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/create_and_append.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/crud/crud_admin_users.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/main_admin_users.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/crud/crud_admin_enrollments.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>test/end-to-end/crud_user.js"></script>
</head>

<body>
    <?php

    include './view/templates/nav.php';

    ?>
    <h1 class="text-center pt-4">Usuarios</h1>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Vertically centered modal -->
            <!-- Modal to Update -->
            <section class="row justify-content-center">
                <div class="modal fade" id="modal-user-info" tabindex="-1" aria-labelledby="modal-user-info-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-success" id="modal-user-info-label">Editar Información Usuario</h5>
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
                                    <div class="mb-3">
                                        <label for="dni-update" class="form-label">DNI:</label>
                                        <input required type="text" name="dni-update" id="dni-update" class="form-control" placeholder="DNI">
                                    </div>
                                    <div class="mb-3">
                                        <label for="img-update" class="form-label">Subir Nueva Imagen:</label>
                                        <input class="form-control" id="img-update" type="file">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nickname-update" class="form-label">Nombre de Usuario:</label>
                                        <input required type="text" name="nickname-update" id="nickname-update" class="form-control" placeholder="Nombre de Usuario">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-update" class="form-label">Contraseña:</label>
                                        <input type="password" name="password-update" id="password-update" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sex-update" class="form-label">Sexo:</label>
                                        <select name="sex-update" id="sex-update" class="form-select" aria-label="Default select example">
                                            <option value="1">Mujer</option>
                                            <option value="2">Hombre</option>
                                            <option value="3">Ninguno</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nationality-update" class="form-label">Nacionalidad:</label>
                                        <select name="nationality-update" id="nationality-update" class="form-select" aria-label="Default select example">
                                            <?php
                                            if ($arrTableNationality) {
                                                for ($i = 0; $i < count($arrTableNationality); $i++) {
                                                    echo '<option value="' . $arrTableNationality[$i]->id . '">' . $arrTableNationality[$i]->nationality . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="email" class="form-label">Correo:</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo del usuarios">
                                    </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary button-close-update" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary button-send">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Modal to Enrol -->
            <section class="row justify-content-center">
                <div class="modal fade" id="modal-enrolment" tabindex="-1" aria-labelledby="modal-enrolment-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-enrol">
                        <div class="modal-content px-5">
                            <div class="modal-header">
                                <h5 class="modal-title text-success" id="modal-enrolment-label">Matriculas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form readonly id="form-enrol" action="javascript:void(0);" method="post">
                                <div class="modal-body row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="year-enrol" class="form-label">Año:</label>
                                            <select name="year-enrol" id="year-enrol" class="form-select" aria-label="Default select example">
                                                <?php
                                                echo '<option value="' . $arrTableYears[0]->id . '" selected>' . $arrTableYears[0]->year . '</option>';
                                                if ($arrTableYears) {
                                                    for ($i = 1; $i < count($arrTableYears); $i++) {
                                                        echo '<option value="' . $arrTableYears[$i]->id . '">' . $arrTableYears[$i]->year . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <label for="type-user" class="form-label">Matricular como:</label>
                                            <select name="type-user" id="type-user" class="form-select" aria-label="Default select example">
                                                <option value="1" selected>Estudiante</option>
                                                <option value="2">Profesor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="short-name-enrol" class="form-label">Nombre:</label>
                                            <select name="short-name-enrol" id="short-name-enrol" class="form-select" aria-label="Default select example">
                                                <!-- Manage By Client -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date-enrollment" class="form-label">Fecha de inicio:</label>
                                            <input required type="date" name="date-enrollment" id="date-enrollment" class="form-control" placeholder="Ej: 01/01/2022">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary button-close-enrol" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-info button-refresh-enrol">Refrescar</button>
                                    <button type="submit" class="btn btn-primary button-send-enrol">Matricular</button>
                                </div>
                            </form>
                            <h3 class="text-success">Lista de Matriculas</h3>
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Curso</th>
                                            <th>Año</th>
                                            <th>Matriculado Como</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-enrollments">
                                        <?php
                                        // Managed By Client Side
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row m-4">
                    </div>
                </div>
            </section>
            <!-- Main to Insert -->
            <section class="row justify-content-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            Insertar Usuarios
                        </div>
                        <div class="card-body">
                            <form id="form" action="javascript:void(0);" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombre:</label>
                                            <input required type="text" name="name" id="name" class="form-control" placeholder="Nombre del usuarios">
                                        </div>
                                        <div class="mb-3">
                                            <label for="last-name" class="form-label">Apellidos:</label>
                                            <input required type="text" name="last-name" id="last-name" class="form-control" placeholder="Apellidos">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nickname" class="form-label">Nombre de Usuario:</label>
                                            <input required type="text" name="nickname" id="nickname" class="form-control" placeholder="Nombre de Usuario">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sex" class="form-label">Sexo:</label>
                                            <select name="sex" id="sex" class="form-select" aria-label="Default select example">
                                                <option value="1" selected>Mujer</option>
                                                <option value="2">Hombre</option>
                                                <option value="3">Ninguno</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="dni" class="form-label">DNI:</label>
                                            <input required type="text" name="dni" id="dni" class="form-control" placeholder="DNI">
                                        </div>
                                        <div class="mb-3">
                                            <label for="img" class="form-label">Imagen de Perfil:</label>
                                            <input autocomplete="off" class="form-control" id="img" type="file">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Contraseña:</label>
                                            <input autocomplete="off" required type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nationality" class="form-label">Nacionalidad:</label>
                                            <select name="nationality" id="nationality" class="form-select" aria-label="Default select example">
                                                <?php
                                                echo '<option value="' . $arrTableNationality[0]->id . '" selected>' . $arrTableNationality[0]->nationality . '</option>';
                                                if ($arrTableNationality) {
                                                    for ($i = 1; $i < count($arrTableNationality); $i++) {
                                                        echo '<option value="' . $arrTableNationality[$i]->id . '">' . $arrTableNationality[$i]->nationality . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success col-5">Agregar Usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="row m-4">
            <h3 class="text-success">Lista de Usuarios</h3>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
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