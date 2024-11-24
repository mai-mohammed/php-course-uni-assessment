<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($route, $handler)
    {
        $this->routes[$route] = $handler;
    }

    public function dispatch($url)
    {
        $url = parse_url($url, PHP_URL_PATH);
        // echo "Requested URL: $url<br>";
        // echo "Available Routes: ";
        // print_r($this->routes);
        // echo "<br>";

        if (array_key_exists($url, $this->routes)) {
            [$controller, $method] = explode('@', $this->routes[$url]);
            $controller = "App\\Controllers\\$controller";
            // echo "Dispatching to Controller: $controller, Method: $method<br>";

            if (class_exists($controller)) {
                $controllerObject = new $controller;
                if (method_exists($controllerObject, $method)) {
                    call_user_func_array([$controllerObject, $method], []);
                } else {
                    echo "Method '$method' not found in '$controller'.<br>";
                }
            } else {
                echo "Controller '$controller' not found.<br>";
            }
        } else {
            echo "Route not defined for '$url'.<br>";
        }
    }
}
