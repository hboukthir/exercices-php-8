<?php

namespace App;

class User
{
    private \PDO $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
    }

    public function create(string $name, string $email): bool
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }
}
