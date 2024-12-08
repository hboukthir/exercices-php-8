<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\CsrfToken;
use app\Database;
use app\User;

session_start();

if (class_exists('app\Database')) {
    $database = new Database();
    $userModel = new User($database);

    $action = $_SERVER['REQUEST_URI'];

    if ($action === '/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!CsrfToken::validate($csrfToken)) {
            die('Invalid CSRF token');
        }

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        $userModel->create($name, $email);
        header('Location: /');
        exit;
    }

    $users = $userModel->getAll();

    require __DIR__ . '/../views/form.php';
    require __DIR__ . '/../views/list.php';
} else {
    echo "La classe Database n'est pas trouvée.";
}
die();


