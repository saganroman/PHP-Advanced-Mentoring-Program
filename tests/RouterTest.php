<?php

use PHPUnit\Framework\TestCase;
use App\Router;
use Nyholm\Psr7\Factory\Psr17Factory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Psr\Http\Message\ResponseInterface;

class RouterTest extends TestCase
{
    public function testRouteDispatch()
    {
        $psr17Factory = new Psr17Factory();
        $request = $psr17Factory->createServerRequest('GET', '/home');

        $container = new ContainerBuilder();
        $container->register('App\Controllers\HomeController', \App\Controllers\HomeController::class);

        $router = new Router($container);
        $router->addRoute('GET', '/home', 'App\Controllers\HomeController@index');

        $response = $router->dispatch($request);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Welcome to the Home page!', (string)$response->getBody());
    }

    public function testRouteNotFound()
    {
        $psr17Factory = new Psr17Factory();
        $request = $psr17Factory->createServerRequest('GET', '/non-existent');

        $container = new ContainerBuilder();

        $router = new Router($container);

        $response = $router->dispatch($request);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringContainsString('Not Found', (string)$response->getBody());
    }
}