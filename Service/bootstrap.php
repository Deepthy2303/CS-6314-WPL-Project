<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
// or if you prefer yaml or XML
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);


// database configuration parameters
$conn = array(
    'dbname' => 'sds',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
);
$mem = new Memcache();
$mem->connect('localhost', 11211);

//MemcachedCache
$cache = new \Doctrine\Common\Cache\MemcacheCache();
$cache->setMemcache($mem);

$config->setResultCacheImpl($cache);
//$config->setMetadataDriverImpl($cache);
//$config->setQueryCacheImpl($cache);
//Sql Logger
$logger = new Doctrine\DBAL\Logging\EchoSQLLogger();
$logger->set_memcache($cache);
$config->setSQLLogger($logger);

//var_dump($config);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
