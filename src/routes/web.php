<?php

/**
 * ルート設定
 */

use App\Controllers\HomeController;
use App\Controllers\DevelopmentController;

$router->get('/', [HomeController::class, 'index']);

// 開発者向けページ

$router->get('/development', [DevelopmentController::class, 'index']);
$router->get('/development/database', [DevelopmentController::class, 'database']);
$router->get('/development/javascript', [DevelopmentController::class, 'javascript']);
// htmx動作確認用API
$router->get('/development/javascript/htmx_api', function () {
    return "<p class='text-green-600'>Hello from server</p>";
});
