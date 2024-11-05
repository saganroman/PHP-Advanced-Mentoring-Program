<?php

namespace iterator;
use iterator\contracts\StringCollection;
use iterator\contracts\StringIterator;
use iterator\FileStringIterator;

require_once __DIR__ . '/contracts/StringCollection.php';
require_once __DIR__ . '/FileStringIterator.php';
class FileStringCollection implements StringCollection {
    private string $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    public function getIterator(): StringIterator {
        return new FileStringIterator($this->filePath);
    }
}
