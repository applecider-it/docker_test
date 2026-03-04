<?php

declare(strict_types=1);

namespace App\Domains\User\Repositories;

use App\Domains\User\Entities\UserEntity;
use App\Domains\User\ValueObjects\User\Id;

use function App\Helpers\app;

use App\Models\User;

/**
 * ユーザー関連の永続処理
 */
class UserRepository
{
    /** IDからユーザー取得 */
    public function getUser(Id $idVO): UserEntity
    {
        $user = User::find($idVO->value());

        $userEntity = $this->eloquentToEntity($user);

        return $userEntity;
    }

    /** ユーザー更新 */
    public function updateUser(UserEntity $userEntity): void
    {
        $user = $this->entityToEloquent($userEntity);

        $user->save();
    }

    /** エンティティから、値を反映した状態のエロカントオブジェクトを生成 */
    private function entityToEloquent(UserEntity $userEntity): User
    {
        $user = User::find($userEntity->id()->value());

        $user->name = $userEntity->name()->value();

        return $user;
    }

    /** エロカントオブジェクトからエンティティを生成 */
    private function eloquentToEntity(User $user): UserEntity
    {
        /** @var UserEntity */
        $userEntity = app(UserEntity::class);

        $userEntity->setId($user->id);
        $userEntity->setName($user->name);

        return $userEntity;
    }
}
