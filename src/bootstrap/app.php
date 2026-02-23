<?php

use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

/**
 * ブートストラップ
 */
class ApplicationBootstrap
{
    public function exec()
    {
        $this->core();
        $this->db();
        $this->pdo();
        $this->doctrine();
    }

    private function core()
    {
        define('APP_ROOT', dirname(__DIR__));
        define('APP_VIEW', APP_ROOT . '/resources/views');

        $dotenv = Dotenv::createImmutable(APP_ROOT);
        $dotenv->load();
    }

    private function db()
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

    private function pdo()
    {
        app()->singleton('pdo', function () {
            return new PDO(
                'mysql:host=mysql;dbname=app;charset=utf8mb4',
                'app',
                'secret',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );;
        });
    }

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
}

// ヘルパー

/** サービスコンテナ */
function app($abstract = null)
{
    $container = Container::getInstance();

    return $abstract === null ? $container : $container->make($abstract);
}

// 実行

(new ApplicationBootstrap)->exec();
