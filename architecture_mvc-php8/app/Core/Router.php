<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function registerRoutes(array $controllers) {
        foreach ($controllers as $controller) {
            $reflection = new \ReflectionClass($controller);
            foreach ($reflection->getMethods() as $method) {
                // Vérification et utilisation de l'attribut Route
                $attributes = $method->getAttributes(Route::class);
                foreach ($attributes as $attribute) {
                    // Crée une instance de l'attribut Route
                    $route = $attribute->newInstance();
                    $this->routes[] = [
                        'method' => $route->method,
                        'path' => $route->path,
                        'handler' => [$controller, $method->getName()]  // Délégation de la méthode
                    ];
                }
            }
        }
    }

    public function handleRequest(string $requestMethod, string $requestUri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                // Instancie le contrôleur avant d'appeler la méthode
                $controller = new $route['handler'][0](); // Création de l'instance
                call_user_func([$controller, $route['handler'][1]]);
                return;
            }
        }

        http_response_code(404);
        echo "Route non trouvée.";
    }
}
