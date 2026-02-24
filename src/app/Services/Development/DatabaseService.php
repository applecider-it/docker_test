<?php

namespace App\Services\Development;

use Laminas\Db\Sql\Sql;

use App\Models\User;
use App\Doctrine\User as UserD;

use function App\Helpers\app;

/**
 * 開発者向けページのDatabase管理
 */
class DatabaseService
{
    /** テストデータ取得 */
    public function getTestData()
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

        return compact('users', 'usersP', 'usersD', 'usersL');
    }
}
