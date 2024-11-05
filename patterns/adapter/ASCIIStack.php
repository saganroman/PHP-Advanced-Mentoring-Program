<?php
namespace adapter;
use InvalidArgumentException;
require_once 'ASCIIStackInterface.php';
class ASCIIStack implements ASCIIStackInterface {
    private array $stack = [];

    public function push(string $char): void {
        if (strlen($char) !== 1) {
            throw new InvalidArgumentException("Only single characters are allowed");
        }
        $this->stack[] = $char;
    }

    public function pop(): ?string {
        if (empty($this->stack)) {
            return null;
        }
        return array_pop($this->stack);
    }
}
