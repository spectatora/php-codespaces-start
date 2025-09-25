<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

header('X-Powered-By: Codespaces PHP Starter');

// Demo: root page
if (!isset($_GET['a']) && !isset($_GET['b'])) {
    echo "<h1>Hello from GitHub Codespaces 👋</h1>";
    echo "<p>PHP " . PHP_VERSION . "</p>";
    echo "<p>Try the demo API: <code>?a=2&b=3</code></p>";
    exit;
}

// Demo: tiny JSON endpoint /?a=..&b=..
header('Content-Type: application/json; charset=utf-8');

$a = isset($_GET['a']) ? (float) $_GET['a'] : 0;
$b = isset($_GET['b']) ? (float) $_GET['b'] : 0;

echo json_encode(['sum' => $a + $b], JSON_PRETTY_PRINT);
