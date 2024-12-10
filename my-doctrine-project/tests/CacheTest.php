<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Psr\Cache\CacheItemPoolInterface;
use Doctrine\ORM\Cache\DefaultCacheFactory;
use Doctrine\ORM\Cache\RegionsConfiguration;

class CacheTest extends TestCase
{
    public function testQueryCaching(): void
    {
        // Créez un cache PSR-6 basé sur ArrayAdapter
        $cachePool = new ArrayAdapter();

        // Vérifiez que le cache implémente CacheItemPoolInterface
        $this->assertInstanceOf(CacheItemPoolInterface::class, $cachePool);

        // Créez la configuration des régions de cache
        $regionsConfig = new RegionsConfiguration();

        // Créez le cacheFactory en passant les bonnes configurations
        $cacheFactory = new DefaultCacheFactory($regionsConfig, $cachePool);

        // Vérifiez que DefaultCacheFactory est bien créé
        $this->assertInstanceOf(DefaultCacheFactory::class, $cacheFactory);

        // Ajoutez une valeur dans le cache
        $cacheItem = $cachePool->getItem('test_key');
        $cacheItem->set('test_value');
        $cachePool->save($cacheItem);

        // Récupérez la valeur et vérifiez qu'elle est correcte
        $fetchedItem = $cachePool->getItem('test_key');
        $this->assertTrue($fetchedItem->isHit());
        $this->assertSame('test_value', $fetchedItem->get());
    }
}
