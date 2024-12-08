<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$paths = [__DIR__ . '/src/Entity'];
$isDevMode = true;

$dbParams = [
    'dbname' => 'doctrine_demo',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];

$config = Setup::createAttributeMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
