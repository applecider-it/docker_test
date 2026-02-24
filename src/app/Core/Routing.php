<?php

namespace App\Core;

use Illuminate\Http\Request;
use voku\helper\HtmlMin;

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

        $html = $response->getContent();

        $htmlMin = new HtmlMin();
        echo $htmlMin->minify($html);
    }
}
