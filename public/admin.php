<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Middleware;

session_start();
Middleware::requireLogin();
Middleware::requireRole('admin');
?>

<h1>Admin Dashboard</h1>
<p>Welcome to the admin dashboard!</p>