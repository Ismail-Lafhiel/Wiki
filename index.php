<?php
require './vendor/autoload.php';

use App\Controllers\CategorieController;
use App\Controllers\HomeController;
use App\Controllers\TagController;
use App\Controllers\UserController;
use App\Controllers\WikiController;
use App\Routes\Router;

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', [HomeController::class, 'index']);
$router->get('/signin', [HomeController::class, 'signin']);
$router->get('/signup', [HomeController::class, 'signup']);

//user routes
$router->get('/users', [UserController::class, 'index']); // Read all users
$router->get('/users/show/{id}', [UserController::class, 'show']); // Read a specific user
$router->get('/users/create', [UserController::class, 'create']); // Show create user form
$router->post('/users/store', [UserController::class, 'store']); // Store a new user
$router->get('/users/edit/{id}', [UserController::class, 'edit']); // Show edit user form
$router->post('/users/update/{id}', [UserController::class, 'update']); // Update a user
$router->post('/users/delete/{id}', [UserController::class, 'destroy']); // Delete a user

//wikis routes
$router->get('/wikis', [WikiController::class, 'index']); // Read all wikis
$router->get('/wikis/show/{id}', [WikiController::class, 'show']); // Read a specific wiki
$router->get('/wikis/create', [WikiController::class, 'create']); // Show create wiki form
$router->post('/wikis/store', [WikiController::class, 'store']); // Store a new wiki
$router->get('/wikis/edit/{id}', [WikiController::class, 'edit']); // Show edit wiki form
$router->post('/wikis/update/{id}', [WikiController::class, 'update']); // Update a wiki
$router->post('/wikis/delete/{id}', [WikiController::class, 'destroy']); // Delete a wiki

//categories routes
$router->get('/categories', [CategorieController::class, 'index']); // Read all categories
$router->get('/categories/create', [CategorieController::class, 'create']); // Show create category form
$router->post('/categories/store', [CategorieController::class, 'store']); // Store a new category
$router->get('/categories/edit/{id}', [CategorieController::class, 'edit']); // Show edit category form
$router->post('/categories/update/{id}', [CategorieController::class, 'update']); // Update a category
$router->post('/categories/delete/{id}', [CategorieController::class, 'destroy']); // Delete a category

//tags routes
$router->get('/tags', [TagController::class, 'index']); // Read all tags
$router->get('/tags/edit/', [TagController::class, 'edit']); // Show edit tag form
$router->post('/tags/update/{id}', [TagController::class, 'update']); // Update a tag
$router->post('/tags/delete/{id}', [TagController::class, 'destroy']); // Delete a tag


$router->run();

