<?php
$questions = json_decode(file_get_contents("data/questions.json"), true);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <style>
        body {
            background: #f4f6fa;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 32px;
        }
        form {
            width: 100%;
        }
        label[for], label > input[type="text"] {
            font-size: 1rem;
            color: #222;
        }
        input[type="text"] {
            padding: 8px 12px;
            border: 1px solid #bbb;
            border-radius: 4px;
            margin-top: 4px;
            width: 60%;
            font-size: 1rem;
            margin-bottom: 18px;
        }
        fieldset {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 18px 16px 12px 16px;
            margin-bottom: 18px;
            background: #f9fafb;
        }
        legend {
            font-weight: bold;
            color: #2c3e50;
            padding: 0 8px;
            font-size: 1.08rem;
        }
        input[type="radio"], input[type="checkbox"] {
            accent-color: #007bff;
            margin-right: 7px;
            transform: scale(1.15);
        }
        button[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 28px;
            font-size: 1.1rem;
            cursor: pointer;
            margin-top: 18px;
            transition: background 0.2s;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button[type="submit"]:hover {
            background: #0056b3;
        }
        @media (max-width: 700px) {
            .container {
                padding: 12px 4vw 18px 4vw;
            }
            input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Тест</h1>
    <form method="POST" action="result.php">
        <label>Ваше имя:<br> <input type="text" name="username" required></label><br><br>
        <?php foreach ($questions as $index => $q): ?>
            <fieldset>
                <legend><?= htmlspecialchars($q['question']) ?></legend>
                <?php foreach ($q['answers'] as $key => $answer): ?>
                    <?php if ($q['type'] === 'single'): ?>
                        <label><input type="radio" name="q<?= $index ?>[]" value="<?= $key ?>"> <?= htmlspecialchars($answer) ?></label><br>
                    <?php else: ?>
                        <label><input type="checkbox" name="q<?= $index ?>[]" value="<?= $key ?>"> <?= htmlspecialchars($answer) ?></label><br>
                    <?php endif; ?>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <button type="submit">Отправить</button>
    </form>
</div>
</body>
</html>
