<?php

namespace App\Controllers;

use App\Models\User;

/**
 * ホームコントローラー
 */
class HomeController
{
    /** トップページ */
    public function index()
    {
        $pdo = app('pdo');

        //User::create(['name' => 'コントローラーから追加']);

        $users = User::all();

        $stmt = $pdo->query('SELECT * FROM users');
        $usersArray = $stmt->fetchAll();

        include(APP_ROOT . '/resources/views/home/index.php');
    }
}
