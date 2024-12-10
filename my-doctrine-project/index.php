<?php

$entityManager = require 'bootstrap.php';

use App\Entity\Order;
use App\Entity\OrderItem;

// Créer un nouvel ordre
$order = new Order();
$order->setCustomerName('John Doe');

$item1 = new OrderItem();
$item1->setProductName('Product A');
$item1->setQuantity(2);

$item2 = new OrderItem();
$item2->setProductName('Product B');
$item2->setQuantity(1);

$order->addItem($item1);
$order->addItem($item2);

// Enregistrer dans la base
$entityManager->persist($order);
$entityManager->flush();

echo "Order created with ID: " . $order->getId();
