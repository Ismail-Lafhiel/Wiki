<?php
require './vendor/autoload.php';

use App\Routes\Router;

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', function () {
    echo 'welcome on home page'; });
$router->get('/edit', function () {
    echo 'welcome on edit page'; });
$router->get('/about', function () {
    echo 'welcome on about page'; });

$router->run();

