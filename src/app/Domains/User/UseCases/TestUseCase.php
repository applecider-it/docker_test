<?php

declare(strict_types=1);

namespace App\Domains\User\UseCases;

use App\Domains\User\Repositories\UserRepository;

use App\Domains\User\ValueObjects\User\Id;

/**
 * テスト用ユースケース
 */
class TestUseCase
{
    function __construct(
        private UserRepository $userRepository,
    ) {}

    /**
     * ユーザーを取得して、名前に文字列を追加して結果を返す
     */
    public function exec(Id $idVO)
    {
        $userEntity = $this->userRepository->getUser($idVO);

        $userEntity->name()->textFunc();

        $this->userRepository->updateUser($userEntity);

        $resultUserEntity = $this->userRepository->getUser($idVO);

        $result = [
            'status' => 'ok',
            'idVO' => $idVO,
            'userEntity' => $userEntity,
            'resultUserEntity' => $resultUserEntity,
        ];

        return compact('result');
    }
}
