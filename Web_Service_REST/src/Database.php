<?php

namespace app;

class Database
{
    private \PDO $connection;

    public function __construct()
    {
        $dotenv = parse_ini_file(__DIR__ . '/../.env');
        $host = $dotenv['DB_HOST'];
        $db = $dotenv['DB_NAME'];
        $user = $dotenv['DB_USER'];
        $pass = $dotenv['DB_PASS'];

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $this->connection = new \PDO($dsn, $user, $pass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ]);
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
