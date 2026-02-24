<?php

namespace App\Helpers;

use Illuminate\Container\Container;

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
    return app('blade')->make($name, $data)->render();
}

/** 環境変数 */
function env(string $key, mixed $defaultValue = null)
{
    // 値がないときは初期値を返す
    if (! array_key_exists($key, $_ENV)) return $defaultValue;

    $val = $_ENV[$key];

    // true, falseなどをboolに変換
    $val2 = filter_var(
        $val,
        FILTER_VALIDATE_BOOLEAN,
        FILTER_NULL_ON_FAILURE
    );

    // 対象外の場合は、元の値を使う
    $result = ($val2 === null) ? $val : $val2;

    return $result;
}
