<?php
declare(strict_types=1);

class UserController {
    public function index(): void {
        // Simule une récupération de données
        $users = [
            ['name' => 'Alice'],
            ['name' => 'Bob'],
            ['name' => 'Charlie']
        ];

        require_once __DIR__ . '/../views/user.php';
    }
}
