<?php
declare(strict_types=1); // Active la gestion stricte des types

// Fichier: Product.php
class Product {
    public function __construct(
        private string $name,
        private float $price
    ) {
        $this->setPrice($price);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        if ($price < 0) {
            throw new InvalidArgumentException("Le prix doit être un nombre positif.");
        }
        $this->price = $price;
    }
}

// Fichier: Catalog.php
class Catalog {
    private array $products = [];

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function listProducts(): void {
        foreach ($this->products as $product) {
            echo "{$product->getName()}: $" . number_format($product->getPrice(), 2) . "\n";
        }
    }
}

// Utilisation
try {
    $product1 = new Product("Produit A", 100);
    $product2 = new Product("Produit B", 150);
    $product3 = new Product("Produit C", -50); // Exception, prix négatif

    $catalog = new Catalog();
    $catalog->addProduct($product1);
    $catalog->addProduct($product2);
    $catalog->addProduct($product3);

    $catalog->listProducts();
} catch (InvalidArgumentException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
