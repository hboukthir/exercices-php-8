<?php
// Inclure bootstrap.php
$entityManager = require_once __DIR__ . '/src/config/bootstrap.php';

// Vérifier si l'EntityManager est correctement configuré
if ($entityManager instanceof \Doctrine\ORM\EntityManager) {
    echo "EntityManager correctement configuré !";
} else {
    echo "Erreur de configuration.";
}
