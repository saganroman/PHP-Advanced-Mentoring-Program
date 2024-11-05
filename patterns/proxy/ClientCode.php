<?php

namespace proxy;

use abstractFactory\Person;
use abstractFactory\contracts\PersonRepository;
use abstractFactory\repos\FilePersonRepository;

require_once 'PersonRepositoryProxy.php';
require_once __DIR__ . '/../abstractFactory/repos/FilePersonRepository.php';
require_once __DIR__ .  '/../abstractFactory/Person.php';


$actualRepository = new FilePersonRepository('people.json');

$proxyRepository = new PersonRepositoryProxy($actualRepository);

$person = new Person('Alice', 30);
$proxyRepository->savePerson($person);

$retrievedPerson = $proxyRepository->readPerson('Alice');
echo "Retrieved: " . $retrievedPerson->getName() . ", age: " . $retrievedPerson->getAge() . PHP_EOL;

$retrievedPersonCached = $proxyRepository->readPerson('Alice');
echo "Retrieved from cache: " . $retrievedPersonCached->getName() . ", age: " . $retrievedPersonCached->getAge() . PHP_EOL;
