<?php

require(__DIR__ . '/../bootstrap.php');

use Debian\Approute\http\Router;
use Debian\Approute\http\Response;
use Debian\Approute\http\Request;
use Debian\Approute\controller\UserController;


$router = new Router;

$router->get('/', function (Request $request, Response $response) {
    return $response->text('hello, world');
});

$router->get('/text', function (Request $request, Response $response) {
    return "Hello, text";
});

$router->get('/users', function (Request $request, Response $response) {
    return "Hello, users";
});

$router->get('/users/{id}', function (Request $request, Response $response) {
    $data = $request->getParams();
    debug($data);
});

$router->get('/about', function (Request $request, Response $response) {
    return $response->json(["name" => "John", "status" => "Smith"]);
});


$router->dispatch();
