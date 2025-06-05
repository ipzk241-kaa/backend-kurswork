<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();
$router->add('', 'HomeController', 'index');
$router->add('routes', 'RouteController', 'index');

$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
