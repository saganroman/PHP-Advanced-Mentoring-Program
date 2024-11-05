<?php

namespace abstractFactory;

class Person
{
    private string $name;
    private int $age;


    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($value): void
    {
        $this->name = $value;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge($value): void
    {
        $this->age = $value;
    }
}
