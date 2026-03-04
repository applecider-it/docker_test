<?php

declare(strict_types=1);

namespace App\Domains\User\Entities;

use App\Domains\User\ValueObjects\User\Id;
use App\Domains\User\ValueObjects\User\Name;

/**
 * ユーザーエンティティ
 */
class UserEntity
{
    private ?Id $id = null;
    private ?Name $name = null;

    // setter getter

    public function setId(int $id): void
    {
        $this->id = new Id($id);
    }
    public function setName(string $name): void
    {
        $this->name = new Name($name);
    }

    public function id(): Id
    {
        return $this->id;
    }
    public function name(): Name
    {
        return $this->name;
    }
}
