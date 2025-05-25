<?php
require_once 'includes/db.php';
include 'views/header.php';

$results = [];
$query = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = trim($_POST['search']);
    $stmt = $pdo->prepare("SELECT * FROM feedback WHERE message LIKE ?");
    $stmt->execute(["%$query%"]);
    $results = $stmt->fetchAll();
}
?>
<h2>Поиск отзывов</h2>
<form method="POST">
    <input name="search" value="<?= htmlspecialchars($query) ?>">
    <button>Поиск</button>
</form>
<?php
foreach ($results as $fb) {
    echo "<div><b>{$fb['user_name']}</b>: {$fb['message']}</div><hr>";
}
include 'views/footer.php';
?>