<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Database;

use app\User;
use app\UserController;

if (class_exists('app\Database')) {
    $database = new Database();
    $user = new User($database);
    $controller = new UserController($user);
    $controller->handleRequest();
} else {
    echo "La classe Database n'est pas trouvée.";
}
die();




