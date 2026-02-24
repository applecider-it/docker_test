<?php

namespace App\Core;

use Illuminate\Http\Request;

use function App\Helpers\app;

/**
 * ルーティング管理
 */
class Routing
{
    /** 実行 */
    public function exec()
    {
        $router = app('router');

        $request = Request::create($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        $response = $router->dispatch($request);

        echo $response->getContent();
    }
}
