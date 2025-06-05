<?php
namespace App\Core;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method = 'index')
    {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch($uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');

        if (array_key_exists($uri, $this->routes)) {
            $controllerName = "\\App\\Controllers\\" . $this->routes[$uri]['controller'];
            $method = $this->routes[$uri]['method'];

            $controller = new $controllerName();
            if (method_exists($controller, $method)) {
                return $controller->$method();
            }
        }

        http_response_code(404);
        echo "404 - Сторінку не знайдено";
    }
}
