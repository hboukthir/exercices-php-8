<?php
namespace App\Models;

use PDO;

class User {
    protected static function db() {
        static $pdo;
        if (!$pdo) {
            $pdo = new PDO('mysql:host=localhost;dbname=projet_mvc', 'root', '');
        }
        return $pdo;
    }

    public static function all() {
        $stmt = self::db()->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $stmt = self::db()->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $stmt = self::db()->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');
        $stmt->execute(['name' => $data['name'], 'email' => $data['email']]);
    }

    public static function update($id, $data) {
        $stmt = self::db()->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $stmt->execute(['id' => $id, 'name' => $data['name'], 'email' => $data['email']]);
    }
}
