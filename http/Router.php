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



    public function dispatch()
    {

        $request = new Request;
        $response = new Response;
    }
}
