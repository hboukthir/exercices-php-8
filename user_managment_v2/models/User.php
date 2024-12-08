<?php
require_once 'config.php';

class User {
    public function getAll(): false|array
    {
        $db = connectDb();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
