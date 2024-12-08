<?php

class User {
    private int $id;
    private string $name;

    // Constructeur
    public function __construct(int $id = 0, string $name = '')
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Récupérer tous les utilisateurs
    public static function getAllUsers(): array
    {
        $stmt = DB::getConnection()->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un utilisateur par ID
    public static function getUserById(int $id): ?User
    {
        $stmt = DB::getConnection()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new User($data['id'], $data['name']) : null;
    }

    // Créer un nouvel utilisateur
    public static function createUser(string $name): User
    {
        $stmt = DB::getConnection()->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $id = DB::getConnection()->lastInsertId();

        return new User((int)$id, $name);
    }

    // Mettre à jour un utilisateur
    public static function updateUser(int $id, string $name): bool
    {
        $stmt = DB::getConnection()->prepare("UPDATE users SET name = :name WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    // Supprimer un utilisateur
    public static function deleteUser(int $id): bool
    {
        $stmt = DB::getConnection()->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Getters et setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
