<?php
declare(strict_types=1);

class Router {
    public function handleRequest(string $uri): void {
        match ($uri) {
            '/', '/home' => $this->loadController('HomeController', 'index'),
            '/users' => $this->loadController('UserController', 'index'),
            default => $this->notFound()
        };
    }

    private function loadController(string $controller, string $method): void {
        $controllerPath = __DIR__ . "/controllers/$controller.php";
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerInstance = new $controller();
            if (method_exists($controllerInstance, $method)) {
                $controllerInstance->$method();
            } else {
                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }

    private function notFound(): void {
        http_response_code(404);
        echo '404 - Page not found';
    }
}
