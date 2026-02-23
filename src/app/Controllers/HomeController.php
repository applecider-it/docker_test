<?php

namespace App\Controllers;

use Laminas\Db\Sql\Sql;

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
        $laminas = app('laminas');

        //User::create(['name' => 'コントローラーから追加']);

        // eloquent
        $users = User::orderBy('id', 'desc')->get();

        // pdo
        $stmt = $pdo->query('SELECT * FROM users');
        $usersP = $stmt->fetchAll();

        // doctrine
        $usersD = $doctrine->createQueryBuilder()
            ->select('u')
            ->from(UserD::class, 'u')
            ->where('u.id > :id')
            ->setParameter('id', 8)
            ->getQuery()
            ->getResult();

        // laminas
        $sql = new Sql($laminas);
        $select = $sql->select();
        $select->from('users');
        $select->where(['id < ?' => 20]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $usersL = $statement->execute();

        (fn($data) => include(APP_VIEW . '/home/index.html.php'))(
            compact('users', 'usersP', 'usersD', 'usersL')
        );
    }
}
