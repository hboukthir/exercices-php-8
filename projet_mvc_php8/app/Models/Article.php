<?php

namespace Models;
use PDO;

class Article
{

    protected static function db() {
        static $pdo;
        if (!$pdo) {
            $pdo = new PDO('mysql:host=localhost;dbname=test_mvc', 'root', '');
        }
        return $pdo;
    }
    public function getAll(): array {
        $stmt = self::db()->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}