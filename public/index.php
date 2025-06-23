<?php

require(__DIR__ . '/../bootstrap.php');

use Debian\Approute\http\Router;
use Debian\Approute\http\Request;
use Debian\Approute\http\Response;


$router = new Router;

$router->get('/', function (Request $request, Response $response) {
    return $response->text('hello, world');
});

$router->get('/about', function (Request $request, Response $response) {
    return $response->json(["name" => "Cristina", "status" => "MILF"]);
});

$router->get('/text', function (Request $request, Response $response) {
    return "Hello, text";
});


$router->dispatch();
