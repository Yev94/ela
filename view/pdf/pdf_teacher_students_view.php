<?php
ob_start();
$title = 'Alumnos';
include './view/templates/head.php';

function dateInSpanish($date)
{
    $tz = 'Europe/Madrid';
    $dt = new DateTime($date);
    $dt->setTimeZone(new DateTimeZone($tz));
    return $dt->format('d/m/Y');
}

require './includes/dompdf/vendor/autoload.php';
require './includes/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set('isRemoteEnabled', true);
$dompdf->setOptions($options);

?>

</head>

<body>
    <h1 class="text-center text-success pt-4">Ecole de Langes Ammari</h1>
    <h2 class="text-center text-success pt-4"><?php echo $title ?></h2>
    <div class="container">
        <div class="row m-4">
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
                        if ($arrTableStudents) {
                            foreach ($arrTableStudents as $student) {
                                echo '<tr>';
                                echo '<td>' . $student->id . '</td>';
                                echo '<td><img src="http://localhost/' . DOMAIN . 'img/users/' . ($student->picture ?? 'default.png') . '" alt="' . $student->name . '" class="img-avatar"></td>';
                                echo '<td>' . $student->name . '</td>';
                                echo '<td>' . $student->identity_card . '</td>';
                                echo '<td>' . dateInSpanish($student->start_date) . '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="footer">
        <p class="page"></p>
    </div>

    <style>
        @page {
            margin: 0px;
            margin-bottom: 100px;
        }

        body {
            margin: 0px;
            margin-top: 50px;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }


        body::before {
            content: " ";
            background-image: url('http://localhost/ela/img/logo-w200.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            position: absolute;
            width: 190px;
            height: 134px;
            top: 20px;
            left: 10px;
        }

        h1 {
            margin-bottom: 40px;
        }

        h2 {
            font-size: 30px;
        }

        .table {
            text-align: center;

        }

        thead {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        tbody {
            border-top: 2px solid currentColor;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        td {
            padding: 0.5rem 0.5rem;
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px;
        }

        .img-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: block;
        }

        #footer {
            position: fixed;
            bottom: -60px;
            left: 50%;
            right: 0px;
            background-color: #ffffff;
            height: 50px;
        }

        #footer .page:after {
            content: counter(page, decimal);
        }
    </style>
</body>

<?php

$html = ob_get_clean();


$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'portrait');


$dompdf->render();
$dompdf->stream($title, array("Attachment" => false));

?>