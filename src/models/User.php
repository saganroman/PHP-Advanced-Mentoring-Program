<?php

namespace App;

class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function findByEmail($email)
    {
        return $this->db->getUserByEmail($email);
    }

    public function create($email, $password, $role = 'user')
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->db->createUser($email, $hashedPassword, $role);
    }
}
