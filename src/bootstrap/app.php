<?php

use Dotenv\Dotenv;

define('APP_ROOT', dirname(__DIR__));

$dotenv = Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

$pdo = new PDO(
    'mysql:host=mysql;dbname=app;charset=utf8mb4',
    'app',
    'secret',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]
);


