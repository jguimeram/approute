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

$router->get('/about', function (Request $request, Response $response) {
    return $response->json(["name" => "Cristina", "status" => "MILF"]);
});

$router->get('/text', function (Request $request, Response $response) {
    return "Hello, text";
});

$router->get('/user', [UserController::class, 'index']);

$router->get('/user/{id}', function (Request $request, Response $response) {
    $request->getParams();
});

$router->dispatch();
