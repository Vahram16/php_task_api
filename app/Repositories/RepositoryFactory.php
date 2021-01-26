<?php


namespace app\Repositories;


use app\Core\Application;
use app\Entity\PhoneBook;
use Doctrine\ORM\EntityManager;

class RepositoryFactory
{

    public static function createRepository(string $entity)
    {
        $repositoryManager = self::getRepositoryManager();
        if (class_exists($entity)) {
            return $repositoryManager->getRepository($entity);
        }
        throw new \Error("can't create class");


    }

    private static function getRepositoryManager()
    {
        $app = Application::createInstance();
        return $app->getConnection();


    }

}