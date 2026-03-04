<?php

declare(strict_types=1);

namespace App\Domains\User\ValueObjects\User;

/**
 * ユーザーIDバリューオブジェクト
 */
class Id
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new \Exception("不正なID");
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
