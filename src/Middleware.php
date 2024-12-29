<?php

namespace App;

class Middleware
{
    public static function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login.php');
            exit();
        }
    }

    public static function requireRole($role)
    {
        if ($_SESSION['user_role'] !== $role) {
            header('Location: /unauthorized.php');
            exit();
        }
    }
}