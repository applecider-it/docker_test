<?php

namespace App\Controllers;

/**
 * ホームコントローラー
 */
class HomeController
{
    /** トップページ */
    public function index($pdo)
    {
        $stmt = $pdo->query('SELECT * FROM users');
        $users = $stmt->fetchAll();

        include(APP_ROOT . '/resources/views/home/index.php');
    }
}
