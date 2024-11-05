<?php

namespace strategy\strategies;

use strategy\contracts\SortingStrategy;

require_once __DIR__ . '/../contracts/SortingStrategy.php';

class DepartmentNameAscending implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => strcmp($a->getDepartment(), $b->getDepartment()));
        return $employees;
    }
}
