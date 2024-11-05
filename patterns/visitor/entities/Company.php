<?php

namespace visitor\entities;

use visitor\contracts\CompanyReportVisitor;

class Company {
    private string $name;
    private array $employees = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function addEmployee(Employee $employee): void {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array {
        return $this->employees;
    }

    public function accept(CompanyReportVisitor $visitor): void {
        $visitor->visitCompany($this);
    }
}
