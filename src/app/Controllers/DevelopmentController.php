<?php

namespace App\Controllers;

use App\Services\Development\DatabaseService;

use function App\Helpers\render;
use function App\Helpers\app;

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
        $data = (app(DatabaseService::class))->getTestData();

        return render('development.database', $data);
    }

    /** javascript動作確認 */
    public function javascript()
    {
        return render('development.javascript');
    }

    /** turbo動作確認 */
    public function turbo()
    {
        return render('development.turbo');
    }

    /** turbo動作確認2 */
    public function turbo2()
    {
        return render('development.turbo2');
    }
}
