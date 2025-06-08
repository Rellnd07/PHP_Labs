<?php
require_once 'config.php';

function loadQuestions() {
    if (!file_exists(QUESTIONS_FILE)) {
        throw new Exception('Questions file not found');
    }
    $content = file_get_contents(QUESTIONS_FILE);
    if ($content === false) {
        throw new Exception('Failed to read questions file');
    }
    $questions = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON in questions file');
    }
    return $questions;
}

function calculateResult($questions, $answers) {
    if (!is_array($questions) || !is_array($answers)) {
        throw new Exception('Invalid input data');
    }

    $correct = 0;
    foreach ($questions as $index => $q) {
        if (!isset($q['correct']) || !is_array($q['correct'])) {
            continue;
        }

        $user = $answers["q$index"] ?? [];
        $user = is_array($user) ? array_map('intval', $user) : [(int)$user];
        $user = array_filter($user, 'is_numeric'); // Remove non-numeric values

        sort($user);
        $correctAnswer = array_map('intval', $q['correct']);
        sort($correctAnswer);

        if ($user === $correctAnswer) {
            $correct++;
        }
    }

    $total = count($questions);
    $percent = $total > 0 ? round(($correct / $total) * 100) : 0;
    return compact('correct', 'total', 'percent');
}

function saveResult($username, $correct, $percent) {
    if (!is_string($username) || !is_numeric($correct) || !is_numeric($percent)) {
        throw new Exception('Invalid input data');
    }

    $username = htmlspecialchars(trim($username), ENT_QUOTES, 'UTF-8');
    
    if (!file_exists(RESULTS_FILE)) {
        $results = [];
    } else {
        $content = file_get_contents(RESULTS_FILE);
        if ($content === false) {
            throw new Exception('Failed to read results file');
        }
        $results = json_decode($content, true) ?? [];
    }

    $results[] = [
        'username' => $username,
        'correct' => (int)$correct,
        'percent' => (int)$percent,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    if (file_put_contents(RESULTS_FILE, json_encode($results, JSON_PRETTY_PRINT)) === false) {
        throw new Exception('Failed to save results');
    }
}

function generateCSRFToken() {
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function validateCSRFToken($token) {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

function isLoggedIn() {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}
?>
