<?php

//create router class
class Router
{

    private array $controllers;
    private const METHOD_GET = 'GET';
    private $notFoundController;
    private const METHOD_POST = 'POST';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = 'DELETE';

    public function get(string $path, $controller)
    {
        $this->addController(self::METHOD_GET, $path, $controller);
    }

    public function post(string $path, $controller)
    {
        $this->addController(self::METHOD_POST, $path, $controller);
    }

    public function put(string $path, $controller)
    {
        $this->addController(self::METHOD_PUT, $path, $controller);
    }

    public function delete(string $path, $controller)
    {
        $this->addController(self::METHOD_DELETE, $path, $controller);
    }

    public function addNotFoundController($controller)
    {
        $this->notFoundController = $controller;
    }

    private function addController(string $method, string $path, $controller)
    {
        $this->controllers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'controller' => $controller
        ];
    }

    public function run()
    {
        $requestURI = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestURI['path'];

        $method = $_SERVER['REQUEST_METHOD'];

        $callback = null;

        foreach ($this->controllers as $controller) {


            if ($controller['path'] === $requestPath &&  $method === $controller['method']) {
                $callback = $controller['controller'];
            };
        }

        //Change string to array and use the class method
        if (is_string($callback)) {
            $parts = explode('::', $callback);
            if (is_array($parts)) {
                $className = array_shift($parts);
                $controller = new $className();
                $method = array_shift($parts);
                $callback = [$controller, $method];
            }
        }

        if (!$callback) {
            header('HTTP/1.1 404 Not Found');
            if (!empty($this->notFoundController)) {
                $callback = $this->notFoundController;
            }
        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}
