<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\User;

$dsn = 'mysql:host=localhost;dbname=your_database';
$username = 'your_username';
$password = 'your_password';

$db = new Database($dsn, $username, $password);
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->create($_POST['email'], $_POST['password']);
    header('Location: /login.php');
    exit();
}
?>

<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
</form>