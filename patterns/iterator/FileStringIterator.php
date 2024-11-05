<?php

namespace iterator;

use iterator\contracts\StringIterator;
class FileStringIterator implements StringIterator {
    private $fileHandle;
    private ?string $nextLine;

    public function __construct(string $filePath) {
        $this->fileHandle = fopen($filePath, 'r');
        $this->nextLine = $this->readNextLine();
    }

    public function __destruct() {
        if ($this->fileHandle !== false) {
            fclose($this->fileHandle);
        }
    }

    public function hasNext(): bool {
        return $this->nextLine !== null;
    }

    public function getNext(): ?string {
        if (!$this->hasNext()) {
            return null;
        }

        $currentLine = $this->nextLine;
        $this->nextLine = $this->readNextLine();

        return $currentLine;
    }

    private function readNextLine(): ?string {
        if ($this->fileHandle && !feof($this->fileHandle)) {
            $line = fgets($this->fileHandle);
            return $line !== false ? trim($line) : null;
        }
        return null;
    }
}
