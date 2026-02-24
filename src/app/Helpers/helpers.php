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

/** Viewレンダラー */
function render($name, array $data = [])
{
    include(APP_ROOT . '/resources/views/' . str_replace('.', '/', $name) . '.html.php');
}
