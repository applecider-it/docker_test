<?php

use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

/**
 * ブートストラップ
 */
class ApplicationBootstrap
{
    public function exec() {
        $this->core();
        $this->db();
        $this->container();
    }

    private function core()
    {
        define('APP_ROOT', dirname(__DIR__));

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

    private function container()
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
