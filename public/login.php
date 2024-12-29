<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\User;

session_start();

$dsn = 'mysql:host=localhost;dbname=your_database';
$username = 'your_username';
$password = 'your_password';

$db = new Database($dsn, $username, $password);
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userData = $user->findByEmail($_POST['email']);
    if ($userData && password_verify($_POST['password'], $userData['password'])) {
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_role'] = $userData['role'];
        header('Location: /dashboard.php');
        exit();
    } else {
        echo 'Invalid credentials';
    }
}
?>

<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>