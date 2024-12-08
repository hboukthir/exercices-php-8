<?php
class Router {
    public function route($uri): void
    {
        if ($uri === '/' || $uri === '/home') {
            require_once 'controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index();
        } elseif ($uri === '/user') {
            require_once 'controllers/UserController.php';
            $controller = new UserController();
            $controller->index();
        } else {
            echo '404 - Page not found';
        }
    }
}
