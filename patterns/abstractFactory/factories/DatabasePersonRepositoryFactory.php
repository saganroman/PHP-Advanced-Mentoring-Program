<?php

namespace abstractFactory\factories;

use abstractFactory\repos\DatabasePersonRepository;
use abstractFactory\contracts\PersonRepository;
use abstractFactory\contracts\PersonRepositoryFactory;

require_once __DIR__ .'/../repos/DatabasePersonRepository.php';
require_once __DIR__ . '/../contracts/PersonRepositoryFactory.php';

class DatabasePersonRepositoryFactory implements PersonRepositoryFactory
{
    private \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function createPersonRepository(): PersonRepository
    {
        return new DatabasePersonRepository($this->db);
    }
}
