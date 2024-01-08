<?php
require './vendor/autoload.php';

use App\Controllers\HomeController;
use App\Routes\Router;

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', [HomeController::class, 'index']);


$router->run();

