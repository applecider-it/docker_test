<?php

/**
 * ルート設定
 */

use App\Controllers\HomeController;
use App\Controllers\DevelopmentController;

$router->get('/', [HomeController::class, 'index']);

$router->get('/development', [DevelopmentController::class, 'index']);
$router->get('/development/database', [DevelopmentController::class, 'database']);
$router->get('/development/javascript', [DevelopmentController::class, 'javascript']);
