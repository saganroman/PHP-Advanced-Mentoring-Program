<?php

namespace strategy\strategies;

use strategy\contracts\SortingStrategy;

require_once __DIR__ . '/../contracts/SortingStrategy.php';
class SalaryDescending implements SortingStrategy {
    public function sort(array $employees): array {
        usort($employees, fn($a, $b) => $b->getSalary() <=> $a->getSalary());
        return $employees;
    }
}
