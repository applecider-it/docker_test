<?php

namespace App\Core;

use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

use Laminas\Db\Adapter\Adapter;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;

use Illuminate\Routing\Router;
use Illuminate\Routing\CallableDispatcher;
use Illuminate\Routing\Contracts\CallableDispatcher as CallableDispatcherContract;

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

        $this->blade();

        $this->router();
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

    /** bladeの初期化 */
    private function blade()
    {
        app()->singleton('blade', function () {
            $filesystem = new Filesystem;
            $eventDispatcher = new Dispatcher(app());

            $viewResolver = new Factory(
                new \Illuminate\View\Engines\EngineResolver,
                new FileViewFinder($filesystem, [APP_ROOT . '/resources/views']),
                $eventDispatcher
            );

            // Bladeエンジン登録
            $bladeCompiler = new \Illuminate\View\Compilers\BladeCompiler(
                $filesystem,
                APP_ROOT . '/storage/cache'
            );

            $viewResolver->getEngineResolver()->register('blade', function () use ($bladeCompiler) {
                return new \Illuminate\View\Engines\CompilerEngine($bladeCompiler);
            });

            return $viewResolver;
        });
    }

    /** routerの初期化 */
    private function router()
    {
        // routerを使うときに必要なシングルトン
        app()->singleton(
            CallableDispatcherContract::class,
            function ($container) {
                return new CallableDispatcher($container);
            }
        );

        app()->singleton('router', function () {
            $container = app();
            $events = new Dispatcher($container);
            $router = new Router($events, $container);

            (fn ($router) => include(APP_ROOT . '/routes/web.php'))($router);

            return $router;
        });
    }
}
