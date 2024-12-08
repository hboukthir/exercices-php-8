<?php

class ProductCache
{
    private WeakMap $cache;

    public function __construct() {
        $this->cache = new WeakMap();
    }

    // Add a product to the cache
    public function add(Product $product, array $data): void {
        $this->cache[$product] = $data;
    }

    // Get cached data for a product
    public function get(Product $product): ?array {
        return $this->cache[$product] ?? null;
    }

    // Display the current cache for debugging
    public function debugCache(): void {
        foreach ($this->cache as $product => $data) {
            echo "Cached Product: {$product->name}, Data: " . json_encode($data) . PHP_EOL;
        }
    }
}