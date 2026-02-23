<?php

namespace App\Controllers;

use Laminas\Db\Sql\Sql;

use App\Models\User;
use App\Doctrine\User as UserD;

/**
 * 開発者向けページコントローラー
 */
class DevelopmentController
{
    /** トップページ */
    public function index()
    {
        (fn() => include(APP_VIEW . '/development/index.html.php'))();
    }

    /** database動作確認 */
    public function database()
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

        (fn($data) => include(APP_VIEW . '/development/database.html.php'))(
            compact('users', 'usersP', 'usersD', 'usersL')
        );
    }

    /** javascript動作確認 */
    public function javascript()
    {
        (fn() => include(APP_VIEW . '/development/javascript.html.php'))();
    }
}
