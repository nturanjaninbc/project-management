<?php

namespace App\Domain\Employee\VO;

use App\Domain\Employee\Enums\CurrencyEnum;

class Salary
{
    public function __construct(
        private readonly int $value,
        private readonly CurrencyEnum $currency = CurrencyEnum::EUR
    ) {
        if ($this->value <= 0) {
            throw new \Exception('top low');
        }
    }

    public function greaterThan(int $value): bool
    {
        return $this->value > $value;
    }
}
