<?php

namespace App\Core;

use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;

use Illuminate\Routing\Router;
use Illuminate\Routing\CallableDispatcher;
use Illuminate\Routing\Contracts\CallableDispatcher as CallableDispatcherContract;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;

use Illuminate\Config\Repository;

use function App\Helpers\app;
use function App\Helpers\config;

/**
 * ブートストラップ
 */
class Bootstrap
{
    /** 実行 */
    public function exec()
    {
        $this->core();

        $this->router();

        $this->eloquent();

        $this->view();
    }

    /** コアの初期化 */
    private function core()
    {
        $dotenv = Dotenv::createImmutable(APP_ROOT);
        $dotenv->load();

        app()->singleton('config', function () {
            return new Repository(include(APP_ROOT . '/config/config.php'));
        });
    }

    /** eloquentの初期化 */
    private function eloquent()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => config('database.host'),
            'database' => config('database.database'),
            'username' => config('database.username'),
            'password' => config('database.password'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /** viewの初期化 */
    private function view()
    {
        app()->singleton('view', function ($container) {
            $filesystem = new Filesystem;
            $eventDispatcher = new Dispatcher($container);

            $viewResolver = new Factory(
                new \Illuminate\View\Engines\EngineResolver,
                new FileViewFinder($filesystem, [APP_ROOT . '/resources/views']),
                $eventDispatcher
            );

            // Bladeエンジン登録
            $bladeCompiler = new \Illuminate\View\Compilers\BladeCompiler(
                $filesystem,
                APP_ROOT . '/storage/cache/blade'
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

        app()->singleton('router', function ($container) {
            $events = new Dispatcher($container);
            $router = new Router($events, $container);

            (fn($router) => include(APP_ROOT . '/routes/web.php'))($router);

            $routes = $router->getRoutes();

            // UrlGeneratorを使うために必要な処理
            $routes->refreshNameLookups();

            return $router;
        });

        app()->singleton('url', function () {
            $router = app('router');
            $routes = $router->getRoutes();

            $baseUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

            $request = Request::create($baseUrl);

            $url = new UrlGenerator($routes, $request);

            return $url;
        });
    }
}
