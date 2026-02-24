<?php

namespace App\Controllers;

use App\Services\Development\DatabaseService;

use function App\Helpers\app;

/**
 * 開発者向けページコントローラー
 */
class DevelopmentController
{
    /** トップページ */
    public function index()
    {
        return app('blade')->make('development.index')->render();
    }

    /** database動作確認 */
    public function database()
    {
        $data = (new DatabaseService)->getTestData();

        return app('blade')->make('development.database', $data)->render();
    }

    /** javascript動作確認 */
    public function javascript()
    {
        return app('blade')->make('development.javascript')->render();
    }
}
