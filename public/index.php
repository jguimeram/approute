<?php

require(__DIR__ . '/../bootstrap.php');

use Debian\Approute\http\Router;


$router = new Router;

$router->get('/', function ($request, $response) {
    return $response->text('hello, world')->send();
});

$router->dispatch();
