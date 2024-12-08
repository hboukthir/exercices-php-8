<?php
// Charger l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Test de débogage pour vérifier si le fichier est bien chargé
echo "Fichier index.php chargé<br>";

// Utiliser le routeur
use App\Core\Router;

$router = new Router();
$router->run(); // Lancer le routeur
