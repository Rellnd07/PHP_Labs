<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /login.php');
    exit;
}
require_once '../includes/db.php';

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM feedback WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: manage_feedback.php");
    exit;
}

$feedbacks = $pdo->query("SELECT * FROM feedback ORDER BY created_at DESC")->fetchAll();
?>
<h2>Управление отзывами</h2>
<?php foreach ($feedbacks as $f): ?>
    <div>
        <b><?= htmlspecialchars($f['user_name']) ?></b> (<?= htmlspecialchars($f['email']) ?>)
        <p><?= nl2br(htmlspecialchars($f['message'])) ?></p>
        <small><?= $f['created_at'] ?></small><br>
        <a href="?delete=<?= $f['id'] ?>" onclick="return confirm('Удалить?')">Удалить</a>
        <hr>
    </div>
<?php endforeach; ?>
