<?php

namespace App\Controllers;

use App\Models\User;
use App\Doctrine\User as UserD;

/**
 * ホームコントローラー
 */
class HomeController
{
    /** トップページ */
    public function index()
    {
        $pdo = app('pdo');
        $doctrine = app('doctrine');

        //User::create(['name' => 'コントローラーから追加']);

        $users = User::all();

        $stmt = $pdo->query('SELECT * FROM users');
        $usersP = $stmt->fetchAll();

        $usersD = $doctrine->createQueryBuilder()
            ->select('u')
            ->from(UserD::class, 'u')
            ->where('u.id > :id')
            ->setParameter('id', 8)
            ->getQuery()
            ->getResult();

        (fn($data) => include(APP_VIEW . '/home/index.html.php'))(
            compact('users', 'usersP', 'usersD')
        );
    }
}
