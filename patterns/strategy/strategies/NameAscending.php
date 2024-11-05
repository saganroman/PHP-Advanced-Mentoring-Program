<?php

namespace strategy\strategies;

use strategy\contracts\SortingStrategy;

require_once __DIR__ . '/../contracts/SortingStrategy.php';
class NameAscending implements SortingStrategy {
    public function sort(array $employees): array {
        usort($employees, fn($a, $b) => strcmp($a->getName(), $b->getName()));
        return $employees;
    }
}
