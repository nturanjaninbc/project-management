<?php

namespace App\Domain\Employee\Enums;

enum CurrencyEnum: string
{
    case RSD = 'rsd';
    case EUR = 'eur';
    case USD = 'usd';
}
