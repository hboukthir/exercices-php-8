<?php
use App\Entity\Product;
use App\Entity\Category;

require_once __DIR__ . '/../src/config/config.php';

$category = new Category();
$category->setName("Electronics");

$product = new Product();
$product->setName("Smartphone")
        ->setPrice(299.99)
        ->setCategory($category);

$entityManager->persist($category);
$entityManager->persist($product);
$entityManager->flush();

echo "Product with ID " . $product->getId() . " has been added.\n";
