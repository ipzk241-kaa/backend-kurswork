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

    foreach ($this->routes as $route => $info) {
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<\1>[^/]+)', $route);
        $pattern = "@^" . trim($pattern, '/') . "$@";

        if (preg_match($pattern, $uri, $matches)) {
            $controllerName = "\\App\\Controllers\\" . $info['controller'];
            $method = $info['method'];
            $controller = new $controllerName();
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

            if (method_exists($controller, $method)) {
                return call_user_func_array([$controller, $method], array_values($params));
            }
        }
    }

    http_response_code(404);
    echo "404 - Сторінку не знайдено";
}
}