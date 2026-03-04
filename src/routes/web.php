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
$router->get('/development/ddd', [DevelopmentController::class, 'ddd'])->name('development.ddd');
