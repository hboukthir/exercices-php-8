<?php
declare(strict_types=1);

require_once 'config.php';

class User {
    public function getAll(): array {
        $db = connectDb();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
