<?php

namespace App\Core;

use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

use Laminas\Db\Adapter\Adapter;

use function App\Helpers\app;

/**
 * ブートストラップ
 */
class Bootstrap
{
    /** 実行 */
    public function exec()
    {
        $this->core();

        $this->eloquent();
        $this->pdo();
        $this->doctrine();
        $this->laminas();
    }

    /** コアの初期化 */
    private function core()
    {
        $dotenv = Dotenv::createImmutable(APP_ROOT);
        $dotenv->load();
    }

    /** eloquentの初期化 */
    private function eloquent()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'mysql',
            'database' => 'app',
            'username' => 'app',
            'password' => 'secret',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /** pdoの初期化 */
    private function pdo()
    {
        app()->singleton('pdo', function () {
            return new \PDO(
                'mysql:host=mysql;dbname=app;charset=utf8mb4',
                'app',
                'secret',
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                ]
            );;
        });
    }

    /** doctrineの初期化 */
    private function doctrine()
    {
        app()->singleton('doctrine', function () {
            // Entityのパス
            $paths = [dirname(__DIR__) . "/app/Doctrine"];
            $isDevMode = true;

            // Doctrine設定
            $config = ORMSetup::createAttributeMetadataConfiguration(
                $paths,
                $isDevMode
            );

            // DB接続情報
            $connectionParams = [
                'driver'   => 'pdo_mysql',
                'host'     => 'mysql',
                'dbname'   => 'app',
                'user'     => 'app',
                'password' => 'secret',
                'charset'  => 'utf8mb4',
            ];

            $connection = DriverManager::getConnection($connectionParams, $config);

            // EntityManager生成
            $entityManager = new EntityManager($connection, $config);

            return $entityManager;
        });
    }

    /** laminasの初期化 */
    private function laminas()
    {
        app()->singleton('laminas', function () {
            $adapter = new Adapter([
                'driver'   => 'Pdo_Mysql',
                'hostname' => 'mysql',
                'database' => 'app',
                'username' => 'app',
                'password' => 'secret',
                'charset'  => 'utf8mb4',
            ]);

            return $adapter;
        });
    }
}
