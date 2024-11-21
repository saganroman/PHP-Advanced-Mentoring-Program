<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Nyholm\Psr7\Factory\Psr17Factory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Router;
use Psr\Http\Message\ResponseInterface;

class FeatureContext implements Context
{
    private $container;
    private $router;
    private $response;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $this->router = new Router($this->container);
    }

    /**
     * @Given I have a route :method :path that maps to :handler
     */
    public function iHaveARouteThatMapsTo($method, $path, $handler)
    {
        $this->router->addRoute($method, $path, $handler);
    }

    /**
     * @When I make a :method request to :path
     */
    public function iMakeARequestTo($method, $path)
    {
        $psr17Factory = new Psr17Factory();
        $request = $psr17Factory->createServerRequest($method, $path);
        $this->response = $this->router->dispatch($request);
    }

    /**
     * @Then the response status code should be :statusCode
     */
    public function theResponseStatusCodeShouldBe($statusCode)
    {
        if ($this->response->getStatusCode() != $statusCode) {
            throw new Exception("Expected status code $statusCode but got " . $this->response->getStatusCode());
        }
    }

    /**
     * @Then the response body should contain :content
     */
    public function theResponseBodyShouldContain($content)
    {
        $body = (string) $this->response->getBody();
        if (strpos($body, $content) === false) {
            throw new Exception("Expected response body to contain '$content' but got '$body'");
        }
    }

}
