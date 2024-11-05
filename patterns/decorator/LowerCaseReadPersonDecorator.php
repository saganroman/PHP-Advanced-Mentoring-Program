<?php

namespace decorator;
use abstractFactory\Person;
use abstractFactory\contracts\PersonRepository;

require_once __DIR__ . '/../abstractFactory/contracts/PersonRepository.php';
require_once __DIR__ . '/../abstractFactory/Person.php';
class LowerCaseReadPersonDecorator implements PersonRepository {
    private PersonRepository $wrapped;

    public function __construct(PersonRepository $wrapped) {
        $this->wrapped = $wrapped;
    }

    public function savePerson(Person $person): void {
        $this->wrapped->savePerson($person);
    }

    public function readPerson(string $name): ?Person {
        $person = $this->wrapped->readPerson($name);
        if ($person) {
            $person->setName(strtolower($person->getName()));
        }
        return $person;
    }

    public function readPeople(): array {
        $people = $this->wrapped->readPeople();
        foreach ($people as $person) {
            $person->setName(strtolower($person->getName()));
        }
        return $people;
    }
}
