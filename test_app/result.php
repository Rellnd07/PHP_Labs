<?php
require_once __DIR__ . '/includes/functions.php';

$username = $_POST['username'];
$questions = loadQuestions();
$userAnswers = $_POST;
unset($userAnswers['username']);

$result = calculateResult($questions, $userAnswers);
saveResult($username, $result['correct'], $result['percent']);

echo "Имя: $username<br>";
echo "Правильных: {$result['correct']} из {$result['total']}<br>";
echo "Процент: {$result['percent']}%<br>";
?>
