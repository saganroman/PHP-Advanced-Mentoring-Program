<?php

namespace abstractFactory\factories;

use abstractFactory\repos\FilePersonRepository;
use abstractFactory\contracts\PersonRepository;
use abstractFactory\contracts\PersonRepositoryFactory;

require_once __DIR__ . '/../contracts/PersonRepositoryFactory.php';

class FilePersonRepositoryFactory implements PersonRepositoryFactory
{
    private string $filePath;
    const FILE_PATH = 'people.json';

    public function __construct(?string $filePath = self::FILE_PATH)
    {
        $this->filePath = $filePath;
    }

    public function createPersonRepository(): PersonRepository
    {
        return new FilePersonRepository($this->filePath);
    }
}
