<?php

namespace app\Core;

use app\Core\Router;
use Doctrine\ORM\EntityManager;

class Application
{
    public Router $route;
    private static Application $instance;
    private EntityManager $connection;
    /**
     * @var Request
     */
    public Request $request;

    private function __construct()
    {
        $this->connection = require_once __DIR__ . './../../config/dbconnection.php';
        $this->route = new Router();
        $this->request = new Request();
    }

    public static function createInstance(): Application
    {
        if (isset(self::$instance)) {
            return self::$instance;
        }
        self::$instance = new Application();
        return self::$instance;

    }

    public function run()
    {
        $this->route->resolve();

    }

    public function getConnection()
    {
        return $this->connection;

    }

}