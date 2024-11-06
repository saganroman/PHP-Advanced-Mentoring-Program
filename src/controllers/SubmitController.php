<?php
namespace App\controllers;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SubmitController {
    public function store(ServerRequestInterface $request): ResponseInterface {
        return new Response(201, [], "Your request successfully stored!");
    }
}