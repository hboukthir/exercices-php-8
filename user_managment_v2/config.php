<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc_project');
define('DB_USER', 'root');
define('DB_PASS', '');

function connectDb() {
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}
