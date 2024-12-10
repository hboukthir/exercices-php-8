<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Order;
use App\Entity\OrderItem;

class OrderTest extends TestCase
{
    public function testAddOrderItem(): void
    {
        $order = new Order();
        $orderItem = new OrderItem();
        $orderItem->setProductName("My product");

        $order->addItem($orderItem);

        $this->assertCount(1, $order->getItems());
        $this->assertSame($order, $orderItem->getOrder());
    }
}
