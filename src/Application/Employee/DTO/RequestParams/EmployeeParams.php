<?php

namespace App\Application\Employee\DTO\RequestParams;

use App\Domain\Team\Enums\TeamRoleEnum;

readonly class EmployeeParams
{
    public function __construct(
        public ?string $name,
        public ?int $salary,
        public ?string $position,
        public ?TeamRoleEnum $role,
    ) {
    }
}
