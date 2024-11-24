<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($route, $handler)
    {
        // Convert dynamic routes to regex (e.g., /products/{id} -> /products/([^/]+))
        $route = preg_replace('/\{([^}]+)\}/', '([^/]+)', $route);
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $handler;
    }

    public function dispatch($url)
    {
        $url = parse_url($url, PHP_URL_PATH);

        foreach ($this->routes as $route => $handler) {
            if (preg_match($route, $url, $matches)) {
                array_shift($matches); // Remove the full match from $matches
                [$controller, $method] = explode('@', $handler);
                $controller = "App\\Controllers\\$controller";

                if (class_exists($controller)) {
                    $controllerObject = new $controller;
                    if (method_exists($controllerObject, $method)) {
                        // Call the controller method and pass URL parameters
                        call_user_func_array([$controllerObject, $method], $matches);
                        return;
                    } else {
                        echo "Method '$method' not found in '$controller'.<br>";
                        return;
                    }
                } else {
                    echo "Controller '$controller' not found.<br>";
                    return;
                }
            }
        }

        echo "Route not defined for '$url'.<br>";
    }
}
