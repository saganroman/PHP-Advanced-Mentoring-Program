<?php

namespace proxy;
use abstractFactory\Person;
use abstractFactory\contracts\PersonRepository;


require_once __DIR__ . '/../abstractFactory/Person.php';
require_once __DIR__ . '/../abstractFactory/contracts/PersonRepository.php';

class PersonRepositoryProxy implements PersonRepository {
    private PersonRepository $personRepository;
    private array $cache = [];

    public function __construct(PersonRepository $personRepository) {
        $this->personRepository = $personRepository;
    }

    public function savePerson(Person $person): void {
        // Save the person in the repository
        $this->personRepository->savePerson($person);

        // Update the cache
        $this->cache[$person->getName()] = $person;
    }

    public function readPeople(): array {
        // Clear the cache and fetch all people from the actual repository
        $this->cache = [];
        $people = $this->personRepository->readPeople();

        // Cache all people by their names
        foreach ($people as $person) {
            $this->cache[$person->getName()] = $person;
        }

        return $people;
    }

    public function readPerson(string $name): ?Person {
        // Check if the person is already cached
        if (isset($this->cache[$name])) {
            return $this->cache[$name];
        }

        // Fetch from the actual repository and cache it
        $person = $this->personRepository->readPerson($name);

        if ($person !== null) {
            $this->cache[$name] = $person;
        }

        return $person;
    }
}
