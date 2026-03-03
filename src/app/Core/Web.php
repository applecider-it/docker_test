<?php

namespace App\Core;

use Illuminate\Http\Request;

use function App\Helpers\app;
use function App\Helpers\env;

/**
 * Web管理
 */
class Web
{
    /** 実行 */
    public function exec()
    {
        $router = app('router');

        $request = Request::create($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        $response = $router->dispatch($request);

        $html = $response->getContent();

        echo $html;
    }
}
