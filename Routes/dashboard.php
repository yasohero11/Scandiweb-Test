<?php

namespace App\Routes;

use App\Controllers\ProductController;
use App\Core\Request;
use App\Core\Router;


$router = new Router(new Request());

$router->get('/', [ProductController::class, 'show']);
$router->get('/addproduct', [ProductController::class, 'add']);

$router->post('/addproduct', [ProductController::class, 'create']);
$router->post('/massDelete', [ProductController::class, 'delete']);


$router->route();
