<?php

namespace App\Controllers;

use App\Services\Development\DatabaseService;

use App\Domains\User\UseCases\TestUseCase;

use function App\Helpers\render;
use function App\Helpers\app;

use App\Models\User;

use App\Domains\User\ValueObjects\User\Id;

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

    /** ddd動作確認 */
    public function ddd()
    {
        $user = User::first();

        $idVO = new Id($user->id);

        $data = (app(TestUseCase::class))->exec($idVO);

        return render('development.ddd', $data);
    }
}
