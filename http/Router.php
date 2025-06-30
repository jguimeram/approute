<?php

namespace Debian\Approute\http;

use Debian\Approute\http\Response;
use Debian\Approute\http\Request;


class Router
{
    private array $routes = [];

    public function get(string $post, callable $handle)
    {
        $this->setRoutes('GET', $post, $handle);
    }

    public function post(string $post, callable $handle)
    {
        $this->setRoutes('POST', $post, $handle);
    }


    private function setRoutes(string $method, string $post, callable $handle)
    {
        $this->routes[$method][$post] = $handle;
    }

    public function executeHandler(callable $handler, Request $request, Response $response)
    {
        try {
            $result = call_user_func($handler, $request, $response);
            if ($result instanceof Response) {
                $result->send();
            } elseif (is_string($result)) {
                $response->text($result)->send();
            } else if (is_array($result)) {
                $response->json($result)->send();
            } else if ($result === null) {
                $response->setCode(204)->send(); // No Content
            } else {
                throw new \Exception('Invalid response type');
            }
        } catch (\Throwable $th) {
            $response->setCode(500)->text('internal server error')->send();
        }
    }


    public function dispatch()
    {

        $request = new Request;
        $response = new Response;

        $method = $request->getMethod();
        $path = $request->getPath();

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            $this->executeHandler($handler, $request, $response);
        } else {
            $response->setCode(404)->text('not found')->send();
        }
    }
}
