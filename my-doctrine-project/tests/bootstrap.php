<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Charger la configuration Doctrine ORM
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../src'],
    isDevMode: true,
);

// Configurer la connexion à une base de données SQLite en mémoire
$connection = \Doctrine\DBAL\DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'memory' => true,
], $config);

// Créer un gestionnaire d'entités
$entityManager = new EntityManager($connection, $config);

// Générer un schéma de base de données pour les tests
$schemaTool = new SchemaTool($entityManager);

// Charger toutes les métadonnées des entités
$classes = $entityManager->getMetadataFactory()->getAllMetadata();

// Supprimer et recréer le schéma (utile pour les tests isolés)
$schemaTool->dropSchema($classes);
$schemaTool->createSchema($classes);

// Renvoyer le gestionnaire d'entités
return $entityManager;
