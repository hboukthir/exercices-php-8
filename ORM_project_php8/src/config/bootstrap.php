<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../../vendor/autoload.php';

// Configuration des métadonnées avec les attributs
$isDevMode = true;
$paths = [__DIR__ . '/../Entity']; // Dossier contenant vos entités

// Configuration de la connexion à la base de données
$connectionOptions = [
    'dbname' => 'orm_db',  // Remplacez par le nom de votre base de données
    'user' => 'root',      // Remplacez par votre utilisateur
    'password' => '',      // Remplacez par votre mot de passe
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];

// Création de la configuration Doctrine
$config = new Configuration();

// Utilisation du driver des attributs pour le mapping des entités
$driver = new AttributeDriver($paths);

// Ajouter le driver des attributs à la configuration
$config->setMetadataDriverImpl($driver);

// Spécifier un répertoire pour stocker les proxies générées
$proxyDir = __DIR__ . '/../Proxies';  // Répertoire où les proxies seront stockées
if (!file_exists($proxyDir)) {
    mkdir($proxyDir, 0777, true);  // Crée le répertoire si il n'existe pas
}
$config->setProxyDir($proxyDir);
$config->setProxyNamespace('App\Proxies');  // Namespace pour les proxies

// Si vous êtes en mode développement, activez le cache des métadonnées
$config->setAutoGenerateProxyClasses($isDevMode);

// Création de la connexion
$connection = DriverManager::getConnection($connectionOptions, $config);

// Création de l'EntityManager
$entityManager = new EntityManager($connection, $config);

// Retourner l'EntityManager
return $entityManager;
