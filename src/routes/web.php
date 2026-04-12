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
$router->get('/development/javascript_htmx', [DevelopmentController::class, 'javascript_htmx'])->name('development.javascript_htmx');
$router->get('/development/atomic', [DevelopmentController::class, 'atomic'])->name('development.atomic');
$router->get('/development/turbo', [DevelopmentController::class, 'turbo'])->name('development.turbo');
$router->get('/development/turbo2', [DevelopmentController::class, 'turbo2'])->name('development.turbo2');
