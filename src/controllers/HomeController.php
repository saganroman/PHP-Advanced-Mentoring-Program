<?php
namespace App\controllers;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController {
    public function index(ServerRequestInterface $request): ResponseInterface {
        $response = new Response();
        $response->getBody()->write('Welcome to the Home page!');
        return $response;
    }
}