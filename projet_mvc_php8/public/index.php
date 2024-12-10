<?php

use Controllers\ErrorController;
use Controllers\HomeController;

require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/ErrorController.php';
require_once '../app/database.php';

$route = $_SERVER['REQUEST_URI'];
$home = new HomeController;
$error = new ErrorController;
$response = match ($route) {

'/' => $home->index(),
'/about' => $home->about(),
default => $error->notFound(),
};

echo $response;
