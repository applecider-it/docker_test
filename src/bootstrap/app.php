<?php

define('APP_ROOT', dirname(__DIR__));

require_once APP_ROOT . '/app/Helpers/helpers.php';

(new App\Core\Bootstrap)->exec();
