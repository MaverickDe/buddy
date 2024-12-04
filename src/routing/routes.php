<?php

require_once './src/controllers/home.php';
require_once './src/controllers/facilities.php';
require_once './src/controllers/facility.php';
require_once './src/controllers/deletefac.php';
require_once './src/controllers/create_facility.php';
require_once './src/controllers/adminlogin.php';
require_once './src/controllers/logout.php';
require_once './src/controllers/update.php';
require_once   __DIR__.'/router.php';



use App\Controllers\HomeController;
use App\Controllers\FacilitiesController;
use App\Controllers\FacilityController;
use App\Controllers\AdminLoginController;
use App\Controllers\CreateFacilityController;
use App\Controllers\LogoutController;
use App\Controllers\DeleteFacilityController;
use App\Controllers\UpdateFacilityController;
use App\Routing\Router;

$_ = "/ecobuddy/";

$router = new Router();

$router->get($_, HomeController::class, 'index');
$router->get("{$_}facilities", FacilitiesController::class, 'view');
$router->get("{$_}facilities/", FacilitiesController::class, 'view');
$router->get("{$_}facility/", FacilityController::class, 'view');
$router->post("{$_}create_facility/", CreateFacilityController::class, 'create');
$router->post("{$_}create_facility", CreateFacilityController::class, 'create');
$router->get("{$_}facility", FacilityController::class, 'view');
$router->get("{$_}delfacility", DeleteFacilityController::class, 'delete');
$router->get("{$_}update", UpdateFacilityController::class, 'update');
$router->get("{$_}update/", UpdateFacilityController::class, 'update');
$router->post("{$_}update", UpdateFacilityController::class, 'update');
$router->post("{$_}update/", UpdateFacilityController::class, 'update');
$router->get("{$_}delfacility/", DeleteFacilityController::class, 'delete');
$router->get("{$_}adminlogin", AdminLoginController::class, 'login');
$router->get("{$_}adminlogin/", AdminLoginController::class, 'login');
$router->post("{$_}adminlogin", AdminLoginController::class, 'login');
$router->post("{$_}adminlogin/", AdminLoginController::class, 'login');
$router->get("{$_}logout/", LogoutController::class, 'logout');
$router->get("{$_}logout", LogoutController::class, 'logout');

$router->dispatch(); 
 ?>