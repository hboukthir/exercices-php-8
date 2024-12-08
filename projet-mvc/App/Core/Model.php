<?php
namespace App\Core;

use PDO;

class Model {
    protected static function db() {
        $config = include __DIR__ . '/../Config/config.php';
        return new PDO($config['dsn'], $config['user'], $config['password']);
    }
}
