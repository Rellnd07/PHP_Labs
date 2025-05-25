<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
</head>
<body>
    <h2>Панель администратора</h2>
    <p>Добро пожаловать, <?= htmlspecialchars($_SESSION['name']) ?>!</p>
    <ul>
        <li><a href="manage_feedback.php">Управление отзывами</a></li>
        <li><a href="manage_users.php">Просмотр пользователей</a></li>
        <li><a href="add_admin.php">Создать нового администратора</a></li>
    </ul>
    <a href="/logout.php">Выйти</a>
</body>
</html>
