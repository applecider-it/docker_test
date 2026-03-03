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
        return render('development.index');
    }

    /** database動作確認 */
    public function database()
    {
        $data = (new DatabaseService)->getTestData();

        return render('development.database', $data);
    }

    /** javascript動作確認 */
    public function javascript()
    {
        return render('development.javascript');
    }
}
