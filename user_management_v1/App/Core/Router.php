<?php
namespace App\Core;

class Router {
    public function run() {
        $url = $_GET['url'] ?? '';
        $segments = explode('/', $url);
        $controllerName = ucfirst($segments[0] ?? 'user') . 'Controller';
        $method = $segments[1] ?? 'index';

        $controllerClass = "\\App\\Controllers\\$controllerName";

        if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
            $controller = new $controllerClass();
            call_user_func_array([$controller, $method], array_slice($segments, 2));
        } else {
            http_response_code(404);
            echo "Page not found";
        }
    }
}
