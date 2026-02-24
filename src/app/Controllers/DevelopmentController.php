<?php

namespace App\Controllers;

use App\Services\Development\DatabaseService;

use function App\Helpers\render;

/**
 * 開発者向けページコントローラー
 */
class DevelopmentController
{
    /** トップページ */
    public function index()
    {
        render('development.index');
    }

    /** database動作確認 */
    public function database()
    {
        $data = (new DatabaseService)->getTestData();

        render('development.database', $data);
    }

    /** javascript動作確認 */
    public function javascript()
    {
        render('development.javascript');
    }
}
