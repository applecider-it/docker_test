<?php

namespace App\Helpers;

use Illuminate\Container\Container;

/**
 * ヘルパー
 */

/** サービスコンテナ */
function app($abstract = null)
{
    $container = Container::getInstance();

    return $abstract === null ? $container : $container->make($abstract);
}

/** View描画 */
function render($name, array $data = [])
{
    return app('blade')->make($name, $data)->render();
}
