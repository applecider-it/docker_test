<?php

namespace App\Controllers;

use App\Services\Development\DatabaseService;

/**
 * 開発者向けページコントローラー
 */
class DevelopmentController
{
    /** トップページ */
    public function index()
    {
        (fn() => include(APP_VIEW . '/development/index.html.php'))();
    }

    /** database動作確認 */
    public function database()
    {
        $data = (new DatabaseService)->getTestData();

        (fn($data) => include(APP_VIEW . '/development/database.html.php'))(
            $data
        );
    }

    /** javascript動作確認 */
    public function javascript()
    {
        (fn() => include(APP_VIEW . '/development/javascript.html.php'))();
    }
}
