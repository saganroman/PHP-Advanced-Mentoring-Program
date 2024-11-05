<?php

namespace decorator;
use abstractFactory\Person;
use abstractFactory\contracts\PersonRepository;

require_once __DIR__ . '/../abstractFactory/contracts/PersonRepository.php';
require_once __DIR__ . '/../abstractFactory/Person.php';

class UppercaseWritePersonDecorator implements PersonRepository {
    private PersonRepository $wrapped;

    public function __construct(PersonRepository $wrapped) {
        $this->wrapped = $wrapped;
    }

    public function savePerson(Person $person): void {
        $originalName = $person->getName();
        $person->setName(strtoupper($originalName));
        $this->wrapped->savePerson($person);
        $person->setName($originalName); // Restore original name
    }

    public function readPerson(string $name): ?Person {
        return $this->wrapped->readPerson($name);
    }

    public function readPeople(): array {
        return $this->wrapped->readPeople();
    }
}
