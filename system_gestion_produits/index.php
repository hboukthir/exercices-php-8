<?php
require_once 'Product.php';
require_once 'ProductCache.php';

// Create products
$product1 = new Product(1, "Laptop");
$product2 = new Product(2, "Smartphone");

// Create cache
$productCache = new ProductCache();

// Add products to the cache
$productCache->add($product1, ['price' => 1000, 'stock' => 50]);
$productCache->add($product2, ['price' => 800, 'stock' => 30]);

// Access cached data
echo "Data for Laptop: " . json_encode($productCache->get($product1)) . PHP_EOL;
echo "Data for Smartphone: " . json_encode($productCache->get($product2)) . PHP_EOL;

// Debug cache
$productCache->debugCache();

// Unset product1 and trigger garbage collection
unset($product1);
gc_collect_cycles();

echo "After GC:" . PHP_EOL;
$productCache->debugCache();
