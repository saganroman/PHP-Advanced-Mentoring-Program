<?php

namespace facade;

class PersonIQFacade {
    private PersonRepository $personRepository;

    public function __construct(PersonRepository $personRepository) {
        $this->personRepository = $personRepository;
    }

    private function findPersonByName(string $name): array {
        $person = $this->personRepository->readPerson($name);
        if ($person === null) {
            throw new \InvalidArgumentException("Person with name '{$name}' not found.");
        }
        return $person;
    }

    public function whoIsTheSmarter(string $person1Name, string $person2Name): array {
        $person1 = $this->findPersonByName($person1Name);
        $person2 = $this->findPersonByName($person2Name);

        return $person1['IQ'] > $person2['IQ'] ? $person1 : $person2;
    }

    // Transfer IQ from one person to another
    public function transferIq(string $fromName, string $toName, int $amountToTransfer): void {
        $fromPerson = $this->findPersonByName($fromName);
        $toPerson = $this->findPersonByName($toName);

        if ($fromPerson['IQ'] < $amountToTransfer) {
            throw new \InvalidArgumentException("{$fromName} does not have enough IQ points to transfer.");
        }

        $fromPerson->setIQ($fromPerson->getIQ() - $amountToTransfer);
        $toPerson->setIQ($toPerson->getIQ() + $amountToTransfer);

        $this->personRepository->savePerson($fromPerson);
        $this->personRepository->savePerson($toPerson);
    }

    public function changeIqByDelta(string $personName, int $delta): void {
        $person = $this->findPersonByName($personName);

        $newIq = $person->getIQ() + $delta;
        $person->setIQ($newIq);

        $this->personRepository->savePerson($person);
    }
}
