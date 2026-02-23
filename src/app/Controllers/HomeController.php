<?php

namespace App\Controllers;

/**
 * ホームコントローラー
 */
class HomeController
{
    /** トップページ */
    public function index()
    {
        (fn() => include(APP_VIEW . '/home/index.html.php'))();
    }
}
