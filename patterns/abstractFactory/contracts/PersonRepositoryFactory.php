<?php

namespace abstractFactory\contracts;

interface PersonRepositoryFactory
{
    public function createPersonRepository(): PersonRepository;

}
