<?php
$title = 'CRUD Usuarios';
include './view/templates/head.php';
include './src/controller/panelBuilder.php';
//Defined in src/controller/login_admin_controller.php->executePost()
$panelBuilder = new PanelBuilder();
$arrRoleNames = [
    '1' => 'Alumno',
    '2' => 'Profesor',
    '3' => 'Administrador',
    'other' => 'Invitado'
];

$roleName = $arrRoleNames[$userRole ?? 'other'];
$name = $userName;

if ($userRole == '3') {
    echo '<link rel="stylesheet" href="' . DOMAIN . 'view/style/ela_admin.css">';
}

?>
<link rel="stylesheet" href="<?php echo DOMAIN ?>view/style/home.css">


</head>

<body>
    <?php

    include './view/templates/nav.php';
    echo '<h1 class="pt-4 text-center"> Bienvenido ' . $name . '</h1>';
    echo '<h2 class="pt-4 text-center"> Estás navegando como ' . $roleName . '</h2>';

    ?>
    <h2 class="text-center">Tu Panel:</h2>
    <div class="container">
        <div class="languages-cards">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 align-items-stretch g-4">
                <?php
                $arrRoleCard = [
                        '1' => [
                            ['Cursos', '?db=courses', 'escuela.png']
                        ],
                        '2' => [
                            ['Alumnos', '?db=students', 'student.png'],
                            ['Cursos', '?db=courses', 'escuela.png'],
                            ['Cuenta', '', 'banca-por-internet.png']
                        ],
                        '3' => [
                            ['Usuarios', '?db=users', 'triangulo.png'],
                            ['Cursos', '?db=courses', 'escuela.png'],
                            ['Cuenta', '', 'banca-por-internet.png']
                        ],
                        'other' => [
                            ['Iniciar sesión', '?db=login', 'login.png']
                        ]
                ];
                foreach ($arrRoleCard[$userRole] as $card) {
                    $panelBuilder->buildCard(... $card);
                }
                
                ?>
            </div>
        </div>
    </div>
    <?php
    include './view/templates/footer.php';
    ?>
</body>