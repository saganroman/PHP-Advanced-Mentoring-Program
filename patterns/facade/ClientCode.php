<?php
namespace facade;

require_once 'Person.php';
require_once 'FilePersonRepository.php';
require_once 'PersonIQFacade.php';

$personRepository = new FilePersonRepository('people.json');

// Create some person objects and save them into the repository
$person1 = new Person('Alice', 30, 120);
$person2 = new Person('Bob', 25, 130);

$personRepository->savePerson($person1);
$personRepository->savePerson($person2);

// Instantiate the facade
$facade = new PersonIQFacade($personRepository);

// Compare two persons by IQ
$smarterPerson = $facade->whoIsTheSmarter('Alice', 'Bob');
echo "{$smarterPerson['name']} is smarter with an IQ of {$smarterPerson['IQ']}.";

// Transfer IQ points
$facade->transferIq('Bob', 'Alice', 10);

// Adjust a person's IQ by a delta
$facade->changeIqByDelta('Alice', 5);
