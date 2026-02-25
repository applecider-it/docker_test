<?php

namespace App\Helpers;

use Illuminate\Container\Container;

use App\Services\System\EnvService;

/**
 * ヘルパー
 */

/**
 * サービスコンテナ
 * 
 * $abstractの指定があるときは、コンテナに保存されているサービス。ないときは、コンテナを返す。
 */
function app($abstract = null)
{
    $container = Container::getInstance();

    return $abstract === null ? $container : $container->make($abstract);
}

/** View描画 */
function render($name, array $data = [])
{
    return app('view')->make($name, $data)->render();
}

/** 環境変数 */
function env(string $key, mixed $defaultValue = null)
{
    // 値がないときは初期値を返す
    if (! array_key_exists($key, $_ENV)) return $defaultValue;

    return EnvService::convertDotEnvValue($_ENV[$key]);
}

/** routeからURL生成 */
function route($name, array $params = [])
{
    return app('url')->route($name, $params);
}

/** 設定取得 */
function config($name)
{
    return app('config')->get($name);
}
