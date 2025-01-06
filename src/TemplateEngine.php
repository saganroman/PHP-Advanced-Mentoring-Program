<?php

namespace App;

class TemplateEngine
{
    private string $baseDir;

    public function __construct()
    {
        $this->baseDir = __DIR__ . '/views';
    }

    /**
     * @throws \Exception
     */
    public function render(string $template, array $data = []): string
    {
        $templatePath = $this->baseDir . '/' . $template . '.php';
        if (!file_exists($templatePath)) {
            throw new \Exception("Template not found: $template, path $templatePath");
        }

        // Securely pass variables to the template
        extract($this->escapeData($data));

        // Capture output
        ob_start();
        include $templatePath;
        return ob_get_clean();
    }

    public function renderJson(array $data): string
    {
        if (!headers_sent()) {
            header('Content-Type: application/json');
        }
        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    private function escapeData(array $data): array
    {
        return array_map(function ($value) {
            if (is_array($value)) {
                return $this->escapeData($value);
            }
            return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
        }, $data);
    }
}
