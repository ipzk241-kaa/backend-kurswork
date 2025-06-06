<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();
$router->add('', 'HomeController', 'index');
$router->add('admin', 'AdminController', 'index');

$router->add('login', 'AuthController', 'login');
$router->add('handle-login', 'AuthController', 'handleLogin');
$router->add('register', 'AuthController', 'register');
$router->add('handle-register', 'AuthController', 'handleRegister');
$router->add('logout', 'AuthController', 'logout');

$router->add('routes', 'RouteController', 'index');
$router->add('routes/admin', 'RouteController', 'admin');
$router->add('routes/create', 'RouteController', 'create');
$router->add('routes/store', 'RouteController', 'store');
$router->add('routes/edit/{id}', 'RouteController', 'edit');
$router->add('routes/update/{id}', 'RouteController', 'update');
$router->add('routes/delete/{id}', 'RouteController', 'delete');

$router->add('gallery', 'GalleryController', 'index');
$router->add('gallery/admin', 'GalleryController', 'admin');
$router->add('gallery/create', 'GalleryController', 'create');
$router->add('gallery/store', 'GalleryController', 'store');
$router->add('gallery/edit/{id}', 'GalleryController', 'edit');
$router->add('gallery/update/{id}', 'GalleryController', 'update');
$router->add('gallery/delete/{id}', 'GalleryController', 'delete');

$router->add('reviews', 'ReviewController', 'index');
$router->add('reviews/create', 'ReviewController', 'create');
$router->add('reviews/store', 'ReviewController', 'store');
$router->add('reviews/admin', 'ReviewController', 'admin');
$router->add('reviews/edit/{id}', 'ReviewController', 'edit');
$router->add('reviews/update/{id}', 'ReviewController', 'update');
$router->add('reviews/delete/{id}', 'ReviewController', 'delete');
$router->add('reviews/approve/{id}', 'ReviewController', 'approve');


$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
