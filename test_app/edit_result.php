<?php
require_once __DIR__ . '/includes/auth.php';
$results = json_decode(file_get_contents('data/results.json'), true);

// Сохраняем изменения, если отправлены все нужные поля
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['id'], $_POST['username'], $_POST['percent'])
) {
    $id = (int)$_POST['id'];
    if (isset($results[$id])) {
        $username = trim($_POST['username']);
        $percent = (int)$_POST['percent'];
        $results[$id]['username'] = $username;
        $results[$id]['percent'] = $percent;
        file_put_contents('data/results.json', json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    header('Location: dashboard.php');
    exit;
}

// Показываем форму редактирования по GET или POST с id
$id = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} elseif (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
}
if ($id !== null && isset($results[$id])) {
    $row = $results[$id];
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Редактировать результат</title>
        <style>
            body { font-family: Arial, sans-serif; background: #f4f6fa; }
            .container { max-width: 400px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 32px 28px 24px 28px; }
            label { display: block; margin-bottom: 10px; }
            input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 18px; border: 1px solid #bbb; border-radius: 4px; }
            button { background: #007bff; color: #fff; border: none; border-radius: 5px; padding: 10px 22px; font-size: 1rem; cursor: pointer; }
            button:hover { background: #0056b3; }
        </style>
    </head>
    <body>
    <div class="container">
        <h2>Редактировать результат</h2>
        <form method="POST" action="edit_result.php">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label>Имя пользователя:
                <input type="text" name="username" value="<?= htmlspecialchars($row['username']) ?>" required>
            </label>
            <label>Процент:
                <input type="number" name="percent" value="<?= $row['percent'] ?>" min="0" max="100" required> %
            </label>
            <button type="submit">Сохранить</button>
        </form>
        <br>
        <a href="dashboard.php">Назад</a>
    </div>
    </body>
    </html>
    <?php
    exit;
}
header('Location: dashboard.php');
exit; 