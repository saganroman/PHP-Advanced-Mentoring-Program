<?php

namespace observer;

require_once 'contracts/Listener.php';
require_once 'contracts/Subject.php';

use observer\contracts\Listener;
use observer\contracts\Subject;

class TextFileScanner implements Subject
{
    private array $listeners = [];

    public function registerListener(Listener $listener): void
    {
        $this->listeners[] = $listener;
    }

    public function removeListener(Listener $listener): void
    {
        $this->listeners = array_filter($this->listeners, fn($l) => $l !== $listener);
    }

    public function notifyListeners(string $word): void
    {
        foreach ($this->listeners as $listener) {
            $listener->update($word);
        }
    }

    public function scanFile(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("File not found.");
        }

        $content = file_get_contents($filePath);
        $words = preg_split('/\s+/', $content);

        foreach ($words as $word) {
            if (!empty($word)) {
                $this->notifyListeners($word);
            }
        }
    }
}
