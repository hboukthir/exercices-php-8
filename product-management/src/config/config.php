<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "../../vendor/autoload.php";

$isDevMode = true;
$dbParams = [
    'driver' => 'pdo_mysql',
    'host' => '127.0.0.1',
    'dbname' => 'product_category_db',
    'user' => 'root',
    'password' => '',
];

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/../src/Entity"], $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
