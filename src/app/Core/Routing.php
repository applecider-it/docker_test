<?php

namespace App\Core;

use App\Controllers;

/**
 * ブートストラップ
 */
class Routing
{
    /** 実行 */
    public function exec()
    {
        match (rtrim($_SERVER['REQUEST_URI'], '/')) {
            '/development' => (new Controllers\DevelopmentController)->index(),
            '/development/database' => (new Controllers\DevelopmentController)->database(),
            '/development/javascript' => (new Controllers\DevelopmentController)->javascript(),
            default => (new Controllers\HomeController)->index(),
        };
    }
}
