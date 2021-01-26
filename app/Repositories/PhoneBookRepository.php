<?php


namespace app\Repositories;

use app\A;
use app\Entity\PhoneBook;
use DI\Container;
use Doctrine\ORM\EntityManager;
use function Symfony\Component\String\s;

class PhoneBookRepository
{

    /**
     * @var mixed
     */
    public static $phoneBookRepository;
    /**
     * @var mixed
     */
    private static EntityManager $connection;

    public static function getPhoneBookRepo()
    {
        self::$connection = require_once __DIR__ . './../../config/dbconnection.php';
        self::$phoneBookRepository = self::$connection->getRepository(PhoneBook::class);

    }

    public static function getRepository()
    {
//        $container = new Container();
//        var_dump($container->get('A'));

        $connction = self::createConnection();
        return $connction->getRepository(PhoneBook::class);

    }

    private static function createConnection()
    {
        var_dump(121212);
        $entityRepository =   require_once __DIR__ . './../../config/dbconnection.php';
var_dump($entityRepository);
    }


}
