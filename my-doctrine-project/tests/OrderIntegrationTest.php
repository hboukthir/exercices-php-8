<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Entity\Order;
use App\Entity\OrderItem;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use PHPUnit\Framework\TestCase;
class OrderIntegrationTest extends TestCase
{
    private $entityManager;
    private $connection;

    protected function setUp(): void
    {
        // Charger la configuration Doctrine ORM
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/../src/Entity'],  // Spécifiez le répertoire des entités
            isDevMode: true
        );

        // Configurer la connexion à une base de données SQLite en mémoire
        $this->connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'memory' => true, // Utilisation de SQLite en mémoire pour les tests
        ], $config);

        // Créer un gestionnaire d'entités
        $this->entityManager = new EntityManager($this->connection, $config);

        // Générer le schéma de la base de données pour les tests
        $schemaTool = new SchemaTool($this->entityManager);

        // Charger toutes les métadonnées des entités
        $classes = $this->entityManager->getMetadataFactory()->getAllMetadata();

        // Supprimer et recréer le schéma (utile pour des tests isolés)
        $schemaTool->dropSchema($classes);
        $schemaTool->createSchema($classes);
    }

    public function testOrderCreationAndOrderItems(): void
    {
        // Créez une commande
        $order = new Order();
        $order->setCustomerName('John Doe');

        // Créez des éléments de commande et liez-les à la commande
        $orderItem1 = new OrderItem();
        $orderItem1->setProductName('Product 1');
        $orderItem1->setQuantity(10);
        $order->addItem($orderItem1);  // Assurez-vous d'avoir une méthode addOrderItem dans l'entité Order

        $orderItem2 = new OrderItem();
        $orderItem2->setProductName('Product 2');
        $orderItem2->setQuantity(150);
        $order->addItem($orderItem2);

        // Persistez la commande et ses éléments dans la base de données
        $this->entityManager->persist($order);
        $this->entityManager->persist($orderItem1);
        $this->entityManager->persist($orderItem2);
        $this->entityManager->flush();

        // Vérifiez si la commande et les éléments ont bien été enregistrés
        $savedOrder = $this->entityManager->getRepository(Order::class)->find($order->getId());

        $this->assertNotNull($savedOrder);
        $this->assertCount(2, $savedOrder->getItems());
        $this->assertEquals('Product 1', $savedOrder->getItems()[0]->getProductName());
        $this->assertEquals(10, $savedOrder->getItems()[0]->getQuantity());
    }

    protected function tearDown(): void
    {
        // Nettoyage : fermer l'EntityManager et la connexion après chaque test
        $this->entityManager->close();
        $this->connection = null;
    }
}
