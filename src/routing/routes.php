<?php

require_once './src/controllers/home.php';
require_once './src/controllers/facilities.php';
require_once './src/controllers/facility.php';
require_once './src/controllers/create_facility.php';
require_once   __DIR__.'/router.php';



use App\Controllers\HomeController;
use App\Controllers\FacilitiesController;
use App\Controllers\FacilityController;
use App\Controllers\CreateFacilityController;
use App\Routing\Router;

$_ = "/ecobuddy/";

$router = new Router();

$router->get($_, HomeController::class, 'index');
$router->get("{$_}facilities", FacilitiesController::class, 'view');
$router->get("{$_}facilities/", FacilitiesController::class, 'view');
$router->get("{$_}facility/", FacilityController::class, 'view');
$router->get("{$_}create_facility/", CreateFacilityController::class, 'view');
$router->get("{$_}create_facility", CreateFacilityController::class, 'view');
$router->get("{$_}facility", FacilityController::class, 'view');
$router->get("{$_}adminlogin", FacilityController::class, 'view');
$router->get("{$_}adminlogin/", FacilityController::class, 'view');

$router->dispatch(); 
 ?>