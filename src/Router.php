<?php
namespace App;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Router
{
    private $container;
    private $routes;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->routes = include __DIR__ . '/../routes.php';
    }

    public function dispatch(ServerRequestInterface $request): ResponseInterface
    {
        $path = $request->getMethod() . ' ' . $request->getUri()->getPath();
        if (isset($this->routes[$path])) {
            list($controller, $action) = explode('@', $this->routes[$path]);
            $controllerInstance = $this->container->get($controller);
            return $controllerInstance->$action($request);
        }
        return new Response(404, [], 'Not Found');
    }
}