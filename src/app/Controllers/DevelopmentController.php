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
        $categoryHash = [
            'tech' => 'Tech',
            'book' => 'Book',
        ];
        $category = 'tech';
        return render('development.javascript', compact('categoryHash', 'category'));
    }

    /** javascript動作確認 htmx API */
    public function javascript_htmx()
    {
        $all = $_GET;

        return render('development.javascript_htmx', [
            'date' => date('Y-m-d H:i:s'),
            'all' => $all,
        ]);
    }

    /** atomic動作確認 */
    public function atomic()
    {
        return render('development.atomic');
    }
}
