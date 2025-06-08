<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            background: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin: 10px 0;
        }
        .button:hover {
            background: #0056b3;
        }
        .admin-link {
            background: #28a745;
        }
        .admin-link:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to <?php echo APP_NAME; ?>!</h1>
        <p>This is a simple test application where you can take quizzes and view your results.</p>
        
        <a href="test.php" class="button">Take the Test</a>
        <br>
        <a href="login.php" class="button admin-link">Admin Panel</a>
    </div>
</body>
</html>
