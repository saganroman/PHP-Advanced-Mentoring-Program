<?php

namespace abstractFactory\repos;

use abstractFactory\contracts\PersonRepository;
use abstractFactory\Person;

class FilePersonRepository implements PersonRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function savePerson(Person $person): void
    {
        $people = $this->readPeople();
        $people[] = ['name' => $person->getName(), 'age' => $person->getAge()];
        // $people[] = $person;
        file_put_contents($this->filePath, json_encode($people));
    }

    public function readPeople(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $data = json_decode(file_get_contents($this->filePath), true) ?? [];
        $people = [];
        foreach ($data as $personData) {
            $people[] = ['name' => $personData['name'], 'age' => $personData['age']];
            // $people[] = new Person($personData['name'], $personData['age']);
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $people = $this->readPeople();
        foreach ($people as $person) {
            if ($person['name'] === $name) {
                return new Person ($person['name'], $person['age']);
            }
        }
        return null;
    }
}
