<?php
namespace App\Core;

class Router {
    public function run() {
        // Récupère l'URL à partir de la query string
        $url = $_GET['url'] ?? '';
        echo "URL récupérée : $url<br>";  // Débogage : afficher l'URL brute

        $segments = explode('/', trim($url, '/'));
        echo "Segments : " . implode(', ', $segments) . "<br>";  // Débogage : afficher les segments de l'URL

        // Définir les valeurs du contrôleur et de la méthode
        $controllerName = ucfirst($segments[0] ?: 'user') . 'Controller';
        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        $controllerClass = "\\App\\Controllers\\$controllerName";

        // Debugging : vérifier la classe et la méthode calculées
        echo "Contrôleur : $controllerClass, Méthode : $method<br>";

        // Vérifie si la classe et la méthode existent
        if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
            $controller = new $controllerClass();
            call_user_func_array([$controller, $method], $params);
        } else {
            http_response_code(404);
            echo "Page non trouvée<br>";
        }
    }
}
