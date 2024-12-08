<?php

use App\Core\Router;

require_once __DIR__ . '/vendor/autoload.php';

// Assurez-vous que la session est bien démarrée
session_start();

// Initialisation de Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

// Créer le routeur
$router = new Router($twig);

// Scanner les routes définies dans le contrôleur
$router->scanRoutes();

// Affichez toutes les routes
//print_r($router->getRoutes());

// Obtenir les informations de la requête
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = $_SERVER['REQUEST_URI'];

// Dispatche la requête
$router->dispatch($requestMethod, $requestPath);
