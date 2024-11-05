<?php

namespace iterator;

use iterator\contracts\StringIterator;
use iterator\contracts\StringCollection;
use iterator\InMemoryStringIterator;

require_once __DIR__ . '/InMemoryStringIterator.php';
require_once __DIR__ . '/contracts/StringCollection.php';

class InMemoryStringCollection implements StringCollection {
    private array $strings;

    public function __construct(array $strings) {
        $this->strings = $strings;
    }

    public function getIterator(): StringIterator {
        return new InMemoryStringIterator($this->strings);
    }
}
