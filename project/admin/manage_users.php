<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /login.php');
    exit;
}
require_once '../includes/db.php';

$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
?>
<h2>Пользователи</h2>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Имя</th><th>Email</th><th>Роль</th><th>Создан</th></tr>
<?php foreach ($users as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['name']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><?= $u['role'] ?></td>
    <td><?= $u['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</table>
