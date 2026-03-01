<?php

/**
 * ルート設定
 */

use App\Controllers\HomeController;
use App\Controllers\DevelopmentController;

$router->get('/', [HomeController::class, 'index'])->name('home');

// 開発者向けページ

$router->get('/development', [DevelopmentController::class, 'index'])->name('development.index');
$router->get('/development/database', [DevelopmentController::class, 'database'])->name('development.database');
$router->get('/development/javascript', [DevelopmentController::class, 'javascript'])->name('development.javascript');
// htmx動作確認用API
$router->get('/development/javascript/htmx_api', function () {
    return "<p class='text-green-600'>Hello from server</p>";
})->name('development.javascript.htmx_api');
// turbo動作確認用API
$router->get('/development/javascript/turbo_api', function () {
    return '
        <turbo-frame id="user_list">
            <ul>
                <li>User A</li>
                <li>User B</li>
            </ul>
        </turbo-frame>';
})->name('development.javascript.turbo_api');
