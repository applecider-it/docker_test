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
        return render('home.index');
    }
}
