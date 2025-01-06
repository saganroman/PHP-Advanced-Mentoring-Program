<?php
use PHPUnit\Framework\TestCase;
use App\TemplateEngine;

class TemplateEngineTest extends TestCase
{
    private TemplateEngine $template;
    private string $templateFile;

    protected function setUp(): void
    {
        $this->template = new TemplateEngine();
        $this->templateFile = 'src/views/phpunit.php';
        file_put_contents($this->templateFile, '<h1>Hello, <?php echo $name; ?></h1>');
    }

    public function testRenderHtml()
    {
        $html = $this->template->render('phpunit', ['name' => 'John']);
        $this->assertStringContainsString('Hello, John', $html);
    }

    public function testRenderJson()
    {
        $json = $this->template->renderJson(['status' => 'success']);
        $this->assertJson($json);
        $this->assertStringContainsString('"status": "success"', $json);
    }

    public function testEscaping()
    {
        $html = $this->template->render('phpunit', ['name' => '<script>alert("XSS")</script>']);
        $this->assertStringNotContainsString('<script>', $html);
    }

    protected function tearDown(): void
    {
        unlink($this->templateFile);
    }
}