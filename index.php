<?php

require 'src/router.php';
require 'src/controller/session/login_controller.php';
require 'src/controller/session/logged_controller.php';
require 'src/controller/session/logout_controller.php';
require 'src/controller/api/api_crud_controller.php';
require 'src/controller/api/api_admin_users_controller.php';
require 'src/controller/api/api_admin_courses_controller.php';
require 'src/controller/api/api_enrollments_controller.php';
require 'src/controller/api/api_teacher_students_controller.php';
require 'src/controller/api/api_upload_file_controller.php';
require 'src/controller/pdf/pdf_teacher_students_controller.php';
require 'includes/config.php';
require 'includes/user_session.php';
//From includes/user_session.php
new UserSession();

//From src/router.php
$router = new Router();
$base = DOMAIN;

//Routes
$adminRoute = 'admin';
$usersRoute = '/users';
$coursesRoute = '/courses';
$enrollmentsRoute = '/enrollments';
$loginUsers = 'login';
$api = 'api';
$apiUsersRoute = $api . $usersRoute;
$apiCoursesRoute = $api . $coursesRoute;
$apiEnrollmentsRoute = $api . $enrollmentsRoute;
$apiTeacherStudents = $api . '/teacher/students';

//From src/router.php
$router->get($base, function () {
    require_once './view/home.php';
});

//From src/router.php
//From src/controller/login_admin_controller.php
$router->get($base . $adminRoute, LoginController::class . '::executeGet');
$router->post($base . $adminRoute,  LoginController::class . '::executePost');

$router->get($base . $loginUsers, LoginController::class . '::executeGet');

$router->post($base . $loginUsers,  LoginController::class . '::executePost');


$router->get($base . 'panel', function ($params) { new LoggedController($params); });
//From src/router.php
//From src/controller/logout_controller.php
$router->get($base . 'logout',  LogoutController::class . '::execute');

//From src/router.php
//From src/controller/api_users_controller.php
$router->get($base . $apiUsersRoute, function ($params) { new ApiAdminUsersController($params); });
$router->put($base . $apiUsersRoute, function ($params) { new ApiAdminUsersController($params); });
$router->delete($base . $apiUsersRoute, function ($params) { new ApiAdminUsersController($params); });

$router->get($base . $apiCoursesRoute, function ($params) { new ApiAdminCoursesController($params); });
$router->put($base . $apiCoursesRoute, function ($params) { new ApiAdminCoursesController($params); });
$router->delete($base . $apiCoursesRoute, function ($params) { new ApiAdminCoursesController($params); });

$router->get($base . $apiEnrollmentsRoute, function ($params) { new ApiEnrollmentsController($params); });
$router->put($base . $apiEnrollmentsRoute, function ($params) { new ApiEnrollmentsController($params); });
$router->delete($base . $apiEnrollmentsRoute, function ($params) { new ApiEnrollmentsController($params); });


$router->get($base . $apiTeacherStudents, function ($params) { new ApiTeacherStudentsController($params); });

$router->get($base . 'pdf', function ($params) { new PdfTeacherStudentController($params); });

$router->post($base . 'api/upload', ApiUploadFileController::class . '::executePost');
//From src/router.php
$router->addNotFoundController(function () {
    require_once './view/404.php';
});

$router->run();


//From src/router.php
// $router->get($base . 'about', function($params){
//     if(isset($params['name'])){
//         $name = $params['name'];
//     } else {
//         $name = 'Gest';
//     }
//     echo '<h1> Hello ' . $name. '</h1>';
// });