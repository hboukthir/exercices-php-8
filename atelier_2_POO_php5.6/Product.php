<?php
// Fichier: Product.php
class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        if (!is_numeric($price) || $price < 0) {
            trigger_error("Le prix doit être un nombre positif.", E_USER_WARNING);
            return;
        }
        $this->price = $price;
    }
}

// Fichier: Catalog.php
class Catalog {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function listProducts() {
        foreach ($this->products as $product) {
            echo $product->getName() . ": $" . $product->getPrice() . "\n";
        }
    }
}

// Utilisation
$product1 = new Product("Produit A", 100);
$product2 = new Product("Produit B", 150);
$product3 = new Product("Produit C", -50); // Avertissement, prix négatif

$catalog = new Catalog();
$catalog->addProduct($product1);
$catalog->addProduct($product2);

$catalog->listProducts();
?>
