<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /login.php');
    exit;
}
require_once '../includes/db.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['password'] ?? '');
    if ($name && $email && $pass && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'admin')");
        $stmt->execute([$name, $email, $hash]);
        $msg = 'Администратор добавлен!';
    } else {
        $msg = 'Проверьте введённые данные.';
    }
}
?>
<h2>Создание администратора</h2>
<?= $msg ? "<p>$msg</p>" : "" ?>
<form method="POST">
    Имя: <input name="name"><br>
    Email: <input name="email"><br>
    Пароль: <input type="password" name="password"><br>
    <button type="submit">Создать</button>
</form>
