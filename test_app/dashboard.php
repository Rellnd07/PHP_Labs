<?php
include 'includes/auth.php';
$results = json_decode(file_get_contents("data/results.json"), true);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6fa; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 32px 28px 24px 28px; }
        h1 { text-align: center; color: #333; margin-bottom: 32px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { border: 1px solid #d1d5db; padding: 10px; text-align: center; }
        th { background: #f0f0f0; }
        tr:nth-child(even) { background: #f9f9f9; }
        .actions { display: flex; gap: 8px; justify-content: center; }
        .btn { padding: 5px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 0.95rem; }
        .btn-edit { background: #ffc107; color: #222; }
        .btn-delete { background: #dc3545; color: #fff; }
        .btn-edit:hover { background: #e0a800; }
        .btn-delete:hover { background: #c82333; }
        form.inline { display: inline; }
    </style>
</head>
<body>
<div class="container">
    <h1>Админ-панель</h1>
    <table>
        <tr><th>Имя</th><th>Баллы</th><th>Время</th><th>Действия</th></tr>
        <?php foreach ($results as $i => $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= $row['percent'] ?>%</td>
                <td><?= $row['timestamp'] ?></td>
                <td class="actions">
                    <form class="inline" method="POST" action="edit_result.php">
                        <input type="hidden" name="id" value="<?= $i ?>">
                        <button type="submit" class="btn btn-edit">Редактировать</button>
                    </form>
                    <form class="inline" method="POST" action="delete_result.php" onsubmit="return confirm('Удалить запись?');">
                        <input type="hidden" name="id" value="<?= $i ?>">
                        <button type="submit" class="btn btn-delete">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="logout.php">Выйти</a>
</div>
</body>
</html>
