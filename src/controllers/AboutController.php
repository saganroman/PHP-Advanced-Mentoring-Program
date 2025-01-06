<?php
namespace App\controllers;

use App\TemplateEngine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AboutController {
    private TemplateEngine $template;

    public function __construct()
    {
        $this->template = new TemplateEngine();
    }
    public function show(ServerRequestInterface $request): ResponseInterface {
        $data = ['title' => 'Home', 'content' => 'Welcome to the home page!'];
        $html = $this->template->render('main', $data);
        return new \Nyholm\Psr7\Response(200, [], $html);
    }

    public function api(): ResponseInterface
    {
        $data = ['status' => 'success', 'message' => 'API response'];
        $json = $this->template->renderJson($data);
        return new \Nyholm\Psr7\Response(200, ['Content-Type' => 'application/json'], $json);
    }
}