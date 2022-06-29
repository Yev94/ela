<?php
$title = 'Alumnos';
include './view/templates/head.php';
?>

<script defer type="module" src="<?php echo DOMAIN ?>view/js/bootstrap.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/api_crud.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/create_and_append.js"></script>
<script defer type="module" src="<?php echo DOMAIN ?>view/js/api_teacher_students.js"></script>
</head>

<body>
    <?php

    include './view/templates/nav.php';

    ?>
    <h1 class="text-center pt-4"><?php echo $title ?></h1>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Main to Insert -->
            <section class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            Elegir Curso
                        </div>
                        <div class="card-body">
                            <form id="form" action="javascript:void(0);" method="get">
                                <div class="mb-3">
                                    <label for="course-year" class="form-label">Año:</label>
                                    <select name="course-year" id="course-year" class="form-select" aria-label="Default select example">
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
                                    <label for="course-name" class="form-label">Curso:</label>
                                    <select name="course-name" id="course-name" class="form-select" aria-label="Default select example">
                                        <?php
                                        echo '<option value="' . $arrTableCourses[0]->id . '" selected>' . $arrTableCourses[0]->long_name . '</option>';
                                        if ($arrTableCourses) {
                                            for ($i = 1; $i < count($arrTableCourses); $i++) {
                                                echo '<option value="' . $arrTableCourses[$i]->id . '">' . $arrTableCourses[$i]->long_name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Ver Alumnos</button>
                                <a target="_blank" class="btn btn-danger text-white" id="button-pdf" href="http://localhost<?php echo DOMAIN ?>pdf">Generar PDF</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="row m-4">
            <h3 class="text-success">Lista de Alumnos</h3>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto de Perfil</th>
                            <th>Nombre Completo</th>
                            <th>DNI</th>
                            <th>Fecha de Inicio</th>
                        </tr>
                    </thead>
                    <tbody id="students">
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