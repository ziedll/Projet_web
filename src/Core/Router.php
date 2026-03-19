<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function add($route, $controller, $method) {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function run() {
        $url = $_GET['url'] ?? '/';
        $url = '/' . trim($url, '/');

        // Simple routing for now
        if (isset($this->routes[$url])) {
            $route = $this->routes[$url];
            $controllerName = "App\\Controllers\\" . $route['controller'];
            $method = $route['method'];

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $method)) {
                    $controller->$method();
                    return;
                }
            }
        }

        // Fallback or 404
        header("HTTP/1.0 404 Not Found");
        echo "404 - Page non trouvée";
    }
}
