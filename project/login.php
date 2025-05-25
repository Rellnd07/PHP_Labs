<?php
session_start();
require_once 'includes/db.php';

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];
        header('Location: index.php'); exit;
    } else {
        $err = 'Неверный логин или пароль';
    }
}
?>
<form method="POST">
    <h2>Вход</h2>
    <?= $err ? "<p style='color:red'>$err</p>" : "" ?>
    Email: <input type="email" name="email"><br>
    Пароль: <input type="password" name="password"><br>
    <button type="submit">Войти</button>
</form>