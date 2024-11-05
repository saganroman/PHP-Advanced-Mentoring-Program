<?php

namespace facade;

interface PersonRepository {
    public function savePerson(Person $person): void;
    public function readPeople(): array;
    public function readPerson(string $name): ?array;
}
