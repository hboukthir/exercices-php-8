<?php

namespace App\Core;

use ReflectionClass;
use App\Core\Route;

class Router {
    private array $routes = [];
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function addRoute(string $method, string $path, callable $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];

        // Ajoutez cette ligne pour vérifier les routes après chaque ajout
        //print_r($this->routes);
    }

    public function dispatch(string $requestMethod, string $requestPath) {
        foreach ($this->routes as $route) {
            // Vérifiez si la route correspond au chemin avec paramètres
            $pattern = preg_replace('/{[a-zA-Z0-9_]+}/', '(\d+)', $route['path']);  // Remplace {id} par un groupe de chiffres
            if (preg_match("#^$pattern$#", $requestPath, $matches) && $route['method'] === $requestMethod) {
                // Passez les paramètres extraits à la méthode du contrôleur
                array_shift($matches);  // Supprimer l'élément complet de la correspondance
                call_user_func_array($route['handler'], $matches);
                return;
            }
        }

        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Route not found']);
    }


    public function scanRoutes() {
        $controller = new \App\Controller\ArticleController($this->twig);
        $reflection = new ReflectionClass($controller);

        foreach ($reflection->getMethods() as $method) {
            $attributes = $method->getAttributes(Route::class);
            foreach ($attributes as $attribute) {
                //var_dump($attribute);  // Ajoutez cette ligne pour vérifier que l'attribut est bien récupéré
                $route = $attribute->newInstance();
                $this->addRoute($route->method, $route->path, [$controller, $method->getName()]);
            }
        }
    }


    // Méthode pour obtenir toutes les routes
    public function getRoutes() {
        return $this->routes;
    }
}
