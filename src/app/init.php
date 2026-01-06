<?php

use Dotenv\Dotenv;

define('APP_ROOT', dirname(__DIR__));

$dotenv = Dotenv::createImmutable(APP_ROOT);
$dotenv->load();
