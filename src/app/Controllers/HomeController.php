<?php

namespace App\Controllers;

use function App\Helpers\app;

/**
 * ホームコントローラー
 */
class HomeController
{
    /** トップページ */
    public function index()
    {
        return app('blade')->make('home.index')->render();
    }
}
