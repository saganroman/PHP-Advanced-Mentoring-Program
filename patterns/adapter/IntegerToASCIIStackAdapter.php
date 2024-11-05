<?php

use adapter\ASCIIStackInterface;
use adapter\IntegerStackInterface;

require_once 'IntegerStackInterface.php';
require_once 'ASCIIStackInterface.php';

class IntegerToASCIIStackAdapter implements IntegerStackInterface {
    private ASCIIStackInterface $asciiStack;

    public function __construct(ASCIIStackInterface $asciiStack) {
        $this->asciiStack = $asciiStack;
    }

    public function push(int $integer): void {
        $char = chr($integer);
        $this->asciiStack->push($char);
    }

    public function pop(): int {
        $char = $this->asciiStack->pop();
        if ($char === null) {
            throw new UnderflowException("Stack is empty");
        }
        return ord($char);
    }
}
