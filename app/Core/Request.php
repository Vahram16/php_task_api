<?php


namespace app\Core;


class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        $position = strpos($path, '?');
        if ($position == false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function getBody()
    {
        switch ($this->getMethod()) {

            case 'delete':
            case 'get':
            {
                return $this->getGetBody();

            }

            case 'post':
            {
                return $this->getPostBody();

            }
        }

    }

    private function getGetBody()
    {
        $body = [];
        foreach ($_GET as $key => $value) {
            $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;


    }

    private function getPostBody()
    {
        $body = [];
        foreach ($_POST as $key => $value) {
            $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;


    }

}