<?php

namespace strategy\contracts;

interface SortingStrategy {
    public function sort(array $employees): array;
}
