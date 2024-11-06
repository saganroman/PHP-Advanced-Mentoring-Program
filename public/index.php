<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);

$request = $creator->fromGlobals();
$container = new ContainerBuilder();

//add all controllers into DependencyInjection container
// $controllersDir = __DIR__ . '/../src/controllers/';
$controllersDir = '/app/src/controllers/';
$namespace = 'App\\Controllers\\';
$controllers = new DirectoryIterator($controllersDir);

foreach ($controllers as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $name = $file->getBasename('.php');
        $className = $namespace . $file->getBasename('.php');
        $container->register($name, $className);
    }
}

$router = new Router($container);
$response = $router->dispatch($request);

$emitter = new SapiEmitter();
$emitter->emit($response);