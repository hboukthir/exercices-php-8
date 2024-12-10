<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require_once "vendor/autoload.php";

// Charger le cache Symfony
$cache = new FilesystemAdapter();

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);

// Ajouter les caches
$config->setMetadataCache($cache);
$config->setQueryCache($cache);
$config->setResultCache($cache);

$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',//$_ENV['DB_USER'],
    'password' => '',// $_ENV['DB_PASSWORD'],
    'dbname' => 'doctrine_db',//$_ENV['DB_NAME'],
    'host' => 'localhost',// $_ENV['DB_HOST'],
    'port' => '3306',//$_ENV['DB_PORT'],
];
// configuring the database connection
$connection = DriverManager::getConnection($dbParams, $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
return $entityManager;
