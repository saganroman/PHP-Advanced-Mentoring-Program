<?php

namespace strategy\strategies;

use strategy\contracts\SortingStrategy;

require_once __DIR__ . '/../contracts/SortingStrategy.php';
class NameDescending implements SortingStrategy {
    public function sort(array $employees): array {
        usort($employees, fn($a, $b) => strcmp($b->getName(), $a->getName()));
        return $employees;
    }
}
