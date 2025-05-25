<?php
require_once 'includes/db.php';
session_start();

$err = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $captcha = trim($_POST['captcha']);
    if ($captcha !== ($_SESSION['captcha'] ?? '')) {
        $err = 'Неверная капча.';
    } elseif ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
        $stmt = $pdo->prepare("INSERT INTO feedback (user_name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
        $success = 'Спасибо за отзыв!';
    } else {
        $err = 'Проверьте введённые данные.';
    }
}
$_SESSION['captcha'] = rand(1000,9999);
?>
<form method="POST">
    <h2>Оставьте отзыв</h2>
    <?= $err ? "<p style='color:red'>$err</p>" : "" ?>
    <?= $success ? "<p style='color:green'>$success</p>" : "" ?>
    Имя: <input name="name"><br>
    Email: <input name="email"><br>
    Сообщение:<br><textarea name="message"></textarea><br>
    Введите код: <b><?= $_SESSION['captcha'] ?></b><br>
    <input name="captcha"><br>
    <button type="submit">Отправить</button>
</form>