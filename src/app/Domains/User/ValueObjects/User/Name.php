<?php

declare(strict_types=1);

namespace App\Domains\User\ValueObjects\User;

/**
 * ユーザー名バリューオブジェクト
 */
class Name
{
    private string $value;

    public function __construct(string $value)
    {
        if ($value === '') {
            throw new \Exception("不正な名前");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    /** 動作確認用に、文字列を追加する */
    public function textFunc(): void
    {
        $this->value .= '!';
    }
}
