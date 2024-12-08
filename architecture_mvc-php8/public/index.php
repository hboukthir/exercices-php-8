<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload Composer

use App\Controllers\HomeController;
use App\Core\Router;

// Initialise le routeur et enregistre les routes
$router = new Router();
$router->registerRoutes([HomeController::class]);

// Traitement de la requête
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$router->handleRequest($requestMethod, $requestUri);
