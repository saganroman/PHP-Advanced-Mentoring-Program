<?php

namespace strategy;

use strategy\contracts\SortingStrategy;
use strategy\entities\Employee;

require_once __DIR__ . '/contracts/SortingStrategy.php';
require_once __DIR__ . '/entities/Employee.php';
class EmployeeCollection
{
    private array $employees = [];
    private SortingStrategy $strategy;

    public function __construct(SortingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function setSortingStrategy(SortingStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function getEmployees(): array
    {
        return $this->strategy->sort($this->employees);
    }
}
