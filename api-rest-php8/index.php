<?php

require_once 'DB.php';
require_once 'User.php';
require_once 'UserController.php';

// Exemple de routage simple (le système de routage peut être amélioré)
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Route pour obtenir tous les utilisateurs
if ($requestMethod == 'GET' && $requestUri == '/users') {
    $controller = new UserController();
    $controller->getUsers();
}

// Route pour obtenir un utilisateur par ID
if ($requestMethod == 'GET' && preg_match('/^\/users\/(\d+)$/', $requestUri, $matches)) {
    $id = $matches[1];
    $controller = new UserController();
    $controller->getUserById((int)$id);
}

// Route pour créer un utilisateur
if ($requestMethod == 'POST' && $requestUri == '/users') {
    $controller = new UserController();
    $controller->createUser();
}

// Route pour mettre à jour un utilisateur
if ($requestMethod == 'PUT' && preg_match('/^\/users\/(\d+)$/', $requestUri, $matches)) {
    $id = $matches[1];
    $controller = new UserController();
    $controller->updateUser((int)$id);
}

// Route pour supprimer un utilisateur
if ($requestMethod == 'DELETE' && preg_match('/^\/users\/(\d+)$/', $requestUri, $matches)) {
    $id = $matches[1];
    $controller = new UserController();
    $controller->deleteUser((int)$id);
}
