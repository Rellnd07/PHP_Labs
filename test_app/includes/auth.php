<?php
require_once __DIR__ . '/session_init.php';
require_once 'config.php';
require_once 'functions.php';

// Regenerate session ID periodically
if (!isset($_SESSION['last_regeneration']) || 
    time() - $_SESSION['last_regeneration'] > SESSION_LIFETIME) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

// Check if user is logged in
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}
?>
