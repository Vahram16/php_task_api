<?php


use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . './../vendor/autoload.php';
$isDevMOde = true;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . './../');
$dotenv->load();
$migPath = [__DIR__ . './../app/Migrations'];
$connection = require_once __DIR__ . './database.php';

//$arr =
//    [
//        'driver' => 'pdo_mysql',
//        'host' => 'localhost', 'port' => '3306',
//        'dbname' => 'php_task',
//        'user' => 'root',
//        'password' => null,
//        'migrations_paths' => $migPath,
//
//    ];
//$configM = new \Doctrine\Migrations\Configuration\Migration\PhpFile('Migrations.php');

try {

    $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . './../app/Entity'], true, null, null, false);
    return $entityManager = EntityManager::create($connection, $config);

//    $t = $entityManager->getRepository('PhoneBook');


//    $op = DependencyFactory::fromEntityManager($configM, new ExistingEntityManager($entityManager))
} catch (\Doctrine\ORM\ORMException $e) {
//    var_dump($e);
}

