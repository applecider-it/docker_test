<?php

require_once dirname(__DIR__) . '/bootstrap.php';

echo "DB connected\n<br>";

$stmt = $pdo->query('SELECT * FROM users');
$users = $stmt->fetchAll();

echo '<pre>';
print_r($users);
echo '</pre>';

include(APP_ROOT . '/resources/views/home/index.php');
