<?php

// Chargement de l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Inclure la configuration de la base de données
require_once __DIR__ . '/../src/config/bootstrap.php'; // Fichier de configuration Doctrine

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Category;  // Inclure le bon namespace de l'entité
use Doctrine\ORM\EntityManager;
use App\Entity\Product;

// Exemple d'utilisation des entités Categorie et Produit
// Récupérer toutes les catégories
$categories = $entityManager->getRepository(Category::class)->findAll();

// Récupérer tous les produits
$produits = $entityManager->getRepository(Product::class)->findAll();

// Affichage des résultats dans la page d'accueil
echo "<h1>Gestion des Catégories et Produits</h1>";

echo "<h2>Catégories</h2>";
if (count($categories) > 0) {
    echo "<ul>";
    foreach ($categories as $category) {
        echo "<li>" . $category->getName() . "</li>"; // Afficher le nom de chaque catégorie
    }
    echo "</ul>";
} else {
    echo "<p>Aucune catégorie trouvée.</p>";
}

echo "<h2>Produits</h2>";
if (count($produits) > 0) {
    echo "<ul>";
    foreach ($produits as $product) {
        echo "<li>" . $product->getName(); // Afficher le nom et le prix du produit
    }
    echo "</ul>";
} else {
    echo "<p>Aucun produit trouvé.</p>";
}


