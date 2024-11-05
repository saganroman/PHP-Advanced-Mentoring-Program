<?php

namespace strategy\strategies;

use strategy\contracts\SortingStrategy;

require_once __DIR__ . '/../contracts/SortingStrategy.php';
class SalaryAscending implements SortingStrategy {
    public function sort(array $employees): array {
        usort($employees, fn($a, $b) => $a->getSalary() <=> $b->getSalary());
        return $employees;
    }
}
