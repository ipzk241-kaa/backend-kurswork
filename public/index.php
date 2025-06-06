<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();
$router->add('', 'HomeController', 'index');

$router->add('login', 'AuthController', 'login');
$router->add('handle-login', 'AuthController', 'handleLogin');
$router->add('register', 'AuthController', 'register');
$router->add('handle-register', 'AuthController', 'handleRegister');
$router->add('logout', 'AuthController', 'logout');

$router->add('routes', 'RouteController', 'index');
$router->add('admin-routes', 'RouteController', 'admin');

$router->add('routes/create', 'RouteController', 'create');
$router->add('routes/store', 'RouteController', 'store');
$router->add('routes/edit/{id}', 'RouteController', 'edit');
$router->add('routes/update/{id}', 'RouteController', 'update');
$router->add('routes/delete/{id}', 'RouteController', 'delete');


$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
