<?php
require_once 'models/User.php';

class UserController {
    public function index(): void
    {
        $user = new User();
        $users = $user->getAll();
        require_once 'views/user.php';
    }
}
