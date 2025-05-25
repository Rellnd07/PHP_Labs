<?php
require_once 'includes/db.php';
include 'views/header.php';

$stmt = $pdo->query("SELECT * FROM feedback ORDER BY created_at DESC LIMIT 5");
$feedbacks = $stmt->fetchAll();

echo "<h2>Последние отзывы</h2>";
foreach ($feedbacks as $fb) {
    echo '<div><strong>' . htmlspecialchars($fb['user_name']) . '</strong> (' . htmlspecialchars($fb['email']) . ')<br>';
    echo '<p>' . nl2br(htmlspecialchars($fb['message'])) . '</p>';
    echo '<small>' . $fb['created_at'] . '</small></div><hr>';
}

$news = file_get_contents("includes/news.txt") ?: "Нет новостей.";
echo "<h2>Новости</h2><p>$news</p>";

include 'views/footer.php';
?>