<?php
namespace App\controllers;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AboutController {
    public function show(ServerRequestInterface $request): ResponseInterface {
        return new Response(200, [], phpinfo());
        // return new Response(200, [], "This is About Page!");
    }
}