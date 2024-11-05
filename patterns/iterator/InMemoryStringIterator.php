<?php

namespace iterator;
use iterator\contracts\StringIterator;

require_once __DIR__ . '/contracts/StringIterator.php';

class InMemoryStringIterator implements StringIterator {
    private array $strings;
    private int $currentIndex = 0;

    public function __construct(array $strings) {
        $this->strings = $strings;
    }

    public function hasNext(): bool {
        return $this->currentIndex < count($this->strings);
    }

    public function getNext(): ?string {
        if (!$this->hasNext()) {
            return null;
        }
        return $this->strings[$this->currentIndex++];
    }
}
