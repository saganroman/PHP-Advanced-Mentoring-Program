<?php
namespace iterator\contracts;
interface StringIterator {
    public function hasNext(): bool;
    public function getNext(): ?string;
}
