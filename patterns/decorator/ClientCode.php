<?php

use decorator\LowerCaseReadPersonDecorator;
use decorator\UppercaseWritePersonDecorator;
use abstractFactory\Person;
use abstractFactory\repos\FilePersonRepository;

require_once 'UppercaseWritePersonDecorator.php';
require_once 'LowerCaseReadPersonDecorator.php';
require_once __DIR__ . '/../abstractFactory/factories/FilePersonRepositoryFactory.php';
require_once __DIR__ . '/../abstractFactory/Person.php';
require_once __DIR__ . '/../abstractFactory/repos/FilePersonRepository.php';

$baseRepository = new FilePersonRepository('myFile.json');
$uppercaseWriteDecorator = new UppercaseWritePersonDecorator($baseRepository);

$decoratedRepository = new LowerCaseReadPersonDecorator($uppercaseWriteDecorator);

$person1 = new Person("Roman", 23);
$decoratedRepository->savePerson($person1);

$retrievedPerson = $decoratedRepository->readPerson("ROMAN");
if (!is_null($retrievedPerson)) {
    echo $retrievedPerson->getName();
} else {
    echo "Person not found";
}
