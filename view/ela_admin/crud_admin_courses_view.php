<?php
$title = 'CRUD Cursos';
include './view/templates/head.php';
?>

<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/ela_admin.css">
<script defer type="module" src="<?php echo DOMAIN ?>view/js/bootstrap.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/api_crud.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/create_and_append.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/crud/crud_admin_courses.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/main_admin_courses.js"></script>
</head>

<body>
    <?php

    include './view/templates/nav.php';

    ?>
    <h1 class="text-center pt-4">Cursos</h1>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Vertically centered modal -->
            <div class="modal fade" id="modal-course-info" tabindex="-1" aria-labelledby="modal-course-info-label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-success" id="modal-course-info-label">Editar Información Usuario</h5>
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
                                    <input required type="text" name="name-update" id="name-update" class="form-control" placeholder="Nombre del curso">
                                </div>
                                <div class="mb-3">
                                <label for="year-update" class="form-label">Año del Curso:</label>
                                <select name="year-update" id="year-update" class="form-select" aria-label="Default select example">
                                    <?php
                                    echo '<option value="' . $arrTableYears[0]->id . '" selected>'. $arrTableYears[0]->year .'</option>';
                                    if ($arrTableYears) {
                                        for ($i = 1; $i < count($arrTableYears); $i++) {
                                            echo '<option value="' . $arrTableYears[$i]->id . '">' . $arrTableYears[$i]->year . '</option>';
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
                                <button type="button" class="btn btn-secondary button-close" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary button-send">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-success ">
                        Insertar Cursos
                    </div>
                    <div class="card-body">
                        <form id="form" action="javascript:void(0);" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input required type="text" name="name" id="name" class="form-control" placeholder="Nombre del Curso">
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Año del Curso:</label>
                                <select name="year" id="year" class="form-select" aria-label="Default select example">
                                    <?php
                                    echo '<option value="' . $arrTableYears[0]->id . '" selected>'. $arrTableYears[0]->year .'</option>';
                                    if ($arrTableYears) {
                                        for ($i = 1; $i < count($arrTableYears); $i++) {
                                            echo '<option value="' . $arrTableYears[$i]->id . '">' . $arrTableYears[$i]->year . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Agregar curso</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-4">
            <h3 class="text-success">Lista de Cursos</h3>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Curso</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="courses">
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