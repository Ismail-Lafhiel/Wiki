<?php
require './vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Routes\Router;

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', [HomeController::class, 'index']);
$router->get('/signin', [HomeController::class, 'signin']);
$router->get('/signup', [HomeController::class, 'signup']);
//
$router->get('/users', [UserController::class, 'index']); // Read all users
$router->get('/users/show/{id}', [UserController::class, 'show']); // Read a specific user
$router->get('/users/create', [UserController::class, 'create']); // Show create user form
$router->post('/users/store', [UserController::class, 'store']); // Store a new user
$router->get('/users/edit/{id}', [UserController::class, 'edit']); // Show edit user form
$router->post('/users/update/{id}', [UserController::class, 'update']); // Update a user
$router->post('/users/delete/{id}', [UserController::class, 'destroy']); // Delete a user


$router->run();

