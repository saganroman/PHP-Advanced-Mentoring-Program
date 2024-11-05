<?php

use abstractFactory\factories\FilePersonRepositoryFactory;
use abstractFactory\Client;
use abstractFactory\Person;

require_once 'Client.php';
require_once 'Person.php';
require_once 'repos/DatabasePersonRepository.php';
require_once 'factories/DatabasePersonRepositoryFactory.php';
require_once 'repos/FilePersonRepository.php';
require_once 'factories/FilePersonRepositoryFactory.php';
require_once 'contracts/PersonRepository.php';
require_once 'contracts/PersonRepositoryFactory.php';

//php version= 8.3.0

// $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'secret');
// $factory = new DatabasePersonRepositoryFactory($db);

$factory = new FilePersonRepositoryFactory();

$client = new Client($factory);

$client->addPerson(new Person('Marichka', 30));
$client->addPerson(new Person('Horpyna', 28));

print_r($client->listPeople());
$person = $client->findPerson('Horpyna');
