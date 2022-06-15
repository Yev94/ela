<?php

//create router class
class Router
{

    private array $handlers;
    private const METHOD_GET = 'GET';
    private $notFoundHandler;
    private const METHOD_POST = 'POST';

    public function get(string $path, $handler)
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    public function post(string $path, $handler)
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    public function addNotFoundHandler($handler)
    {
        $this->notFoundHandler = $handler;
    }

    private function addHandler(string $method, string $path, $handler)
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    public function run()
    {
        $requestURI = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestURI['path'];

        $method = $_SERVER['REQUEST_METHOD'];

        $callback = null;
        
        foreach ($this->handlers as $handler) {

            
            if ($handler['path'] === $requestPath &&  $method === $handler['method']) {
                $callback = $handler['handler'];
            };
        }

        //Change string to array and use the class method
        if(is_string($callback)){
            $parts = explode('::', $callback);
            if(is_array($parts)){
                $className = array_shift($parts);
                $handler = new $className();
                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }

        if (!$callback) {
            header('HTTP/1.1 404 Not Found');
            if(!empty($this->notFoundHandler)){
                $callback = $this->notFoundHandler;
            }
        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}
