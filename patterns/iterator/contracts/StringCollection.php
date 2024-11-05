<?php
namespace iterator\contracts;

use iterator\contracts\StringIterator;

interface StringCollection {
    public function getIterator(): StringIterator;
}
