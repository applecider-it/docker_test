<?php

namespace App\Services\System;

/**
 * Env管理
 */
class EnvService
{
    /** .envの値を変換 */
    public static function convertDotEnvValue(mixed $val): mixed
    {
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
}
