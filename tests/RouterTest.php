<?php

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use Debian\Approute\http\Router;

class RouterTest extends TestCase
{
    public function testGetRouteIsRegistered()
    {
        $router = new Router();
        $router->get('/test', function () {
            return 'ok';
        });

        $reflection = new ReflectionClass($router);
        $property = $reflection->getProperty('routes');
        $property->setAccessible(true);
        $routes = $property->getValue($router);

        $this->assertArrayHasKey('GET', $routes);
        $this->assertArrayHasKey('/test', $routes['GET']);
    }

    public function testPostRouteIsRegistered()
    {
        $router = new Router();
        $router->post('/submit', function () {
            return 'submitted';
        });

        $reflection = new ReflectionClass($router);
        $property = $reflection->getProperty('routes');
        $property->setAccessible(true);
        $routes = $property->getValue($router);

        $this->assertArrayHasKey('POST', $routes);
        $this->assertArrayHasKey('/submit', $routes['POST']);
    }
}
