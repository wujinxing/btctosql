<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Load entity configuration from PHP file annotations
// This is the most versatile mode, I advise using it!
// If you don't like it, Doctrine also supports YAML or XML
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode);

// Set up database connection data
$conn = array(
    'driver' => 'pdo_sqlite',
    'path'   => __DIR__.'/data/btc.db'
);

$entityManager = EntityManager::create($conn, $config);