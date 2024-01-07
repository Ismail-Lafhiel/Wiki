<?php
namespace App\Routes;

use App\Routes\Route;

class Router
{
    private $url;
    private $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($this->url, PHP_URL_PATH);

        foreach ($this->routes[$method] as $route) {
            if ($this->matchRoute($route->path, $path)) {
                call_user_func($route->callable);
                return;
            }
        }

        echo '404 - Not Found';
    }

    private function matchRoute($routePath, $requestPath)
    {
        $routePath = rtrim($routePath, '/');
        $requestPath = rtrim($requestPath, '/');
        return $routePath === $requestPath;
    }
}