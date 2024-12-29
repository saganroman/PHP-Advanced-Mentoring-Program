<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Middleware;

session_start();
Middleware::requireLogin();
?>

<h1>Dashboard</h1>
<p>Welcome to your dashboard!</p>