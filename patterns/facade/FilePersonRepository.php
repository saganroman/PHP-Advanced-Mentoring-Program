<?php

namespace facade;
require_once 'PersonRepository.php';
class FilePersonRepository implements PersonRepository {
    private string $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;

        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function savePerson(Person $person): void {
        $people = $this->readPeople();
        $people[] =  ['name' => $person->getName(), 'age' => $person->getAge(), 'IQ' => $person->getIQ()];
        file_put_contents($this->filePath, json_encode($people, JSON_PRETTY_PRINT));
    }

    // Read all people from the file
    public function readPeople(): array {
        $json = file_get_contents($this->filePath);
        $peopleData = json_decode($json, true);

        $people = [];
        if(!$peopleData) {
            return $people;
        }
        foreach ($peopleData as $personData) {
            // $people[] = new Person($personData['name'], $personData['age'], $personData['IQ']);
            $people[] = ['name' => $personData['name'], 'age' => $personData['age'], 'IQ' => $personData['IQ']];
        }
        return $people;
    }

    public function readPerson(string $name): ?array {
        $people = $this->readPeople();

        foreach ($people as $person) {
            if ($person['name'] === $name) {
                return $person;
            }
        }

        return null;
    }
}

