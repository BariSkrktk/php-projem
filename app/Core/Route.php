<?php

namespace App\Core;

class Route
{
    protected static $routes = [];

    public static function add($uri, $action)
    {
        self::$routes[$uri] = $action;
    }

    public static function dispatch($uri)
    {
        if (!isset(self::$routes[$uri])) {
            http_response_code(404);
            echo "404 Not Found - Route bulunamadı";
            return;
        }

        $action = self::$routes[$uri];

        // "Front\TaskController@index" gibi bir ifade geldiyse parçala
        if (is_string($action) && strpos($action, '@') !== false) {
            list($controller, $method) = explode('@', $action);

            // Burada otomatik olarak App\Controllers\ prefix ekliyoruz
            $controller = "App\\Controllers\\" . $controller;

            if (class_exists($controller)) {
                $instance = new $controller();
                if (method_exists($instance, $method)) {
                    return $instance->$method();
                } else {
                    echo "404 Not Found - Metot bulunamadı";
                }
            } else {
                echo "404 Not Found - Sınıf bulunamadı";
            }
        }
    }
}
