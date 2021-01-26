<?php

namespace app\Core;

use app\Core\Application;


class Router
{
    protected array $routes = [];
    private Request $request;

    function __construct()
    {
        $this->request = new Request();


    }

    public function get(string $path, string $controller, string $callback)
    {
        $this->routes['get'][$path]['method'] = $callback;
        $this->routes['get'][$path]['controller'] = $controller;

    }

    public function post(string $path, string $controller, string $callback)
    {
        $this->routes['post'][$path]['method'] = $callback;
        $this->routes['post'][$path]['controller'] = $controller;

    }

    public function delete(string $path, string $controller, string $callback)
    {
        $this->routes['delete'][$path]['method'] = $callback;
        $this->routes['delete'][$path]['controller'] = $controller;

    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback) {
            $controller = $this->routes[$method][$path]['controller'];
            if (class_exists($controller)) {
                $instanceController = new $controller;
                return call_user_func([$instanceController, $callback['method']]);
            }
        }
        echo "Not Found";
        exit();

    }


}