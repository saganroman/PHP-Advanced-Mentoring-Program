<?php

namespace abstractFactory\repos;

use abstractFactory\contracts\PersonRepository;
use abstractFactory\Person;

require_once __DIR__ . '/../contracts/PersonRepository.php';
require_once __DIR__ . '/../Person.php';
class DatabasePersonRepository implements PersonRepository
{
    private \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function savePerson(Person $person): void
    {
        $stmt = $this->db->prepare("INSERT INTO people (name, age) VALUES (:name, :age)");
        $stmt->execute([
            'name' => $person->getName(),
            'age' => $person->getAge(),
        ]);
    }

    public function readPeople(): array
    {
        $stmt = $this->db->query("SELECT * FROM people");
        $peopleData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $people = [];
        foreach ($peopleData as $personData) {
            $people[] = new Person($personData['name'], $personData['age']);
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $stmt = $this->db->prepare("SELECT * FROM people WHERE name = :name");
        $stmt->execute(['name' => $name]);
        $personData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($personData) {
            return new Person($personData['name'], $personData['age']);
        }
        return null;
    }
}
