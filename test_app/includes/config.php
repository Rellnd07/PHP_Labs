<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Application constants
define('APP_NAME', 'Test Application');
define('DATA_DIR', __DIR__ . '/../data/');
define('QUESTIONS_FILE', DATA_DIR . 'questions.json');
define('RESULTS_FILE', DATA_DIR . 'results.json');

define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_LIFETIME', 3600); // 1 hour

if (!file_exists(DATA_DIR)) {
    mkdir(DATA_DIR, 0755, true);
} 