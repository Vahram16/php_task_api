<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\DBAL\Tools\Console as DBALConsole;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\DBAL\Connection;
//require_once __DIR__ . './../vendor/autoload.php';
 require_once __DIR__ . '/dbconnection.php';
 var_dump($entityManager);
return  ConsoleRunner::createHelperSet($entityManager);

//return new HelperSet([
//    'db' => new DBALConsole\Helper\ConnectionHelper($entityManager),
//]);