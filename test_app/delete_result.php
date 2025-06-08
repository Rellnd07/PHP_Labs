<?php
require_once __DIR__ . '/includes/auth.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $results = json_decode(file_get_contents('data/results.json'), true);
    if (isset($results[$id])) {
        array_splice($results, $id, 1);
        file_put_contents('data/results.json', json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
header('Location: dashboard.php');
exit; 