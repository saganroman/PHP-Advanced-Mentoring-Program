<?php
namespace abstractFactory;

use abstractFactory\contracts\PersonRepository;
use abstractFactory\contracts\PersonRepositoryFactory;

class Client
{
    private PersonRepository $personRepository;

    public function __construct(PersonRepositoryFactory $factory) {
        $this->personRepository = $factory->createPersonRepository();
    }

    public function addPerson(Person $person): void {
        $this->personRepository->savePerson($person);
    }

    public function listPeople(): array {
        return $this->personRepository->readPeople();
    }

    public function findPerson(string $name): ?Person {
        return $this->personRepository->readPerson($name);
    }
}
