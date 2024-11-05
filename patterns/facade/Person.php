<?php

namespace facade;

class Person {
    private string $name;
    private int $age;
    private int $IQ;

    public function __construct(string $name, int $age, int $IQ) {
        $this->name = $name;
        $this->age = $age;
        $this->IQ = $IQ;
    }

    public function getName(): string {
        return $this->name;
    }
    public function getAge(): int {
        return $this->age;
    }

    public function getIQ(): int {
        return $this->IQ;
    }

    public function setIQ(int $IQ): void {
        $this->IQ = $IQ;
    }
}
