<?php

namespace App\Services\Development;

use App\Models\User;

/**
 * 開発者向けページのDatabase管理
 */
class DatabaseService
{
    /** テストデータ取得 */
    public function getTestData()
    {
        //User::create(['name' => 'コントローラーから追加']);

        // eloquent
        $users = User::orderBy('id', 'desc')->get();

        return compact('users');
    }
}
