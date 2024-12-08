<?php
declare(strict_types=1);

const DB_HOST = 'localhost';
const DB_NAME = 'mvc_project';
const DB_USER = 'root';
const DB_PASS = 'password';

function connectDb(): PDO {
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}

