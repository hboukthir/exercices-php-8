<?php
namespace App\Models;

use PDO;

class User {
    private static $db;

    // Retourner la connexion à la base de données
    private static function db() {
        if (!self::$db) {
            self::$db = new PDO('mysql:host=localhost;dbname=projet_mvc', 'root', '');
        }
        return self::$db;
    }

    // Obtenir tous les utilisateurs
    public static function all() {
        $stmt = self::db()->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Créer un utilisateur
    public static function create($data) {
        $stmt = self::db()->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email']
        ]);
    }

    // Trouver un utilisateur par ID
    public static function find($id) {
        $stmt = self::db()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un utilisateur
    public static function update($id, $data) {
        $stmt = self::db()->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':id' => $id
        ]);
    }
}
