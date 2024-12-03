<?php

require_once './src/controllers/home.php';
require_once './src/controllers/facilities.php';
require_once   __DIR__.'/router.php';



use App\Controllers\HomeController;
use App\Controllers\FacilitiesController;
use App\Routing\Router;

$_ = "/ecobuddy/";

$router = new Router();

$router->get($_, HomeController::class, 'index');
$router->get("{$_}facilities", FacilitiesController::class, 'index');

$router->dispatch(); 
 ?>