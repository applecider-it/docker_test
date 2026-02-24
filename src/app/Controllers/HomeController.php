<?php

namespace App\Controllers;

use function App\Helpers\render;

/**
 * ホームコントローラー
 */
class HomeController
{
    /** トップページ */
    public function index()
    {
        render('home.index');
    }
}
