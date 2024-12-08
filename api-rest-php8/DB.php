<?php

class DB {
    private static ?PDO $pdo = null;

    // Méthode pour se connecter à la base de données
    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $host = 'localhost';
            $dbname = 'mvc_blog';  // Remplacez par le nom de votre base de données
            $username = 'root';  // Remplacez par votre nom d'utilisateur MySQL
            $password = '';  // Remplacez par votre mot de passe MySQL

            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
