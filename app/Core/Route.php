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
        foreach (self::$routes as $route => $controllerAction) {
            // {id} gibi dinamik parametreleri regex'e çevir
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9-_]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // İlk eşleşme URI'nin tamamı, onu çıkar
                [$controller, $method] = explode('@', $controllerAction);
                $controller = 'App\\Controllers\\' . $controller;

                if (class_exists($controller)) {
                    $instance = new $controller();
                    if (method_exists($instance, $method)) {
                        return call_user_func_array([$instance, $method], $matches);
                    } else {
                        echo "404 Not Found - Metot bulunamadı";
                        return;
                    }
                } else {
                    echo "404 Not Found - Sınıf bulunamadı";
                    return;
                }
            }
        }

        // Hiçbir eşleşme yoksa
        http_response_code(404);
        echo "404 Not Found - Route bulunamadı";
    }
}
