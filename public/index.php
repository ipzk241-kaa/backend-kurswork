<?php
ob_start();
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
$router->add('/reviews/submit', 'ReviewController', 'submit');
$router->add('reviews/store', 'ReviewController', 'store');
$router->add('reviews/admin', 'ReviewController', 'admin');
$router->add('reviews/edit/{id}', 'ReviewController', 'edit');
$router->add('reviews/update/{id}', 'ReviewController', 'update');
$router->add('reviews/delete/{id}', 'ReviewController', 'delete');
$router->add('reviews/approve/{id}', 'ReviewController', 'approve');

$router->add('news', 'NewsController', 'index');
$router->add('news/show/{id}', 'NewsController', 'show');
$router->add('news/create', 'NewsController', 'create');
$router->add('news/store', 'NewsController', 'store');
$router->add('news/edit/{id}', 'NewsController', 'edit');
$router->add('news/update/{id}', 'NewsController', 'update');
$router->add('news/delete/{id}', 'NewsController', 'delete');
$router->add('news/delete-image/{id}', 'NewsController', 'deleteImage');

$router->add('contacts', 'ContactController', 'form');
$router->add('send-contact', 'ContactController', 'send');
$router->add('contacts/admin', 'ContactController', 'index');
$router->add('contacts/delete/{id}', 'ContactController', 'delete');


$uri = $_SERVER['REQUEST_URI'];
try {
    $router->dispatch($uri);
} catch (Throwable $e) {
    http_response_code(500);
    require_once __DIR__ . '/../app/Views/errors/500.php';
}

ob_end_flush();
