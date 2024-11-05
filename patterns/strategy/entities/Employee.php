<?php

namespace strategy\entities;
class Employee {
    private string $name;
    private int $salary;
    private string $department;

    public function __construct(string $name, int $salary, string $department) {
        $this->name = $name;
        $this->salary = $salary;
        $this->department = $department;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSalary(): int {
        return $this->salary;
    }

    public function getDepartment(): string {
        return $this->department;
    }
}
