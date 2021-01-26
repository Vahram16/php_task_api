<?php


use app\Core\Application;
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . './../app/route/api.php';


$app = Application::createInstance();




//$c->set('A',A::class);
//$m= $c->get('A');
//$m->foo();

//if (class_exists()){
//    var_dump(12);
//    $in = new $a();
//}
//

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'../' );
//$dotenv->load();
//$dConfig = require_once __DIR__ .'./../app/helpers/config.php';
//require_once __DIR__ . './../config/dbconnection.php';
//var_dump($dConfig);
//echo $_ENV['DB_DRIVER'];
//$app->route->get('/test', function () {
//
//    echo "VAHRAM";
//});
//
//$app->route->get('/test2',[new TestController,'test']);
$app->run();


