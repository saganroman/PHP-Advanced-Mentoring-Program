<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;

use App\Router;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

ini_set('expose_php', 'Off');
ini_set('disable_functions', 'exec, shell_exec, system, passthru, popen, proc_open');

$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);

$request = $creator->fromGlobals();
$container = new ContainerBuilder();
echo 'Hello World!';
//*************************************************
// $dsn = 'mysql:host=localhost;dbname=your_database';
// $username = 'your_username';
// $password = 'your_password';
//
// $db = new Database($dsn, $username, $password);
//
// // Example usage
// $user = $db->getUserByEmail('example@example.com');
// if ($user) {
//     echo 'User found: ' . $user['email'];
// } else {
//     echo 'User not found';
// }
//*************************************************

//add all controllers into DependencyInjection container
// $controllersDir = __DIR__ . '/../src/controllers/';
$controllersDir = '/var/www/api/src/controllers/';
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