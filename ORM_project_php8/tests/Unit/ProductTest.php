<?php

namespace Tests\Unit;

use App\Entity\Category;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProductCreation(): void
    {
        $category = new Category("Electronics");
        $product = new Product("Laptop", $category);

        $this->assertEquals("Laptop", $product->getName());
        $this->assertEquals("Electronics", $product->getCategory()->getName());
    }
}
