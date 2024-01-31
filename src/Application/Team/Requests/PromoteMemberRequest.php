<?php

namespace App\Application\Team\Requests;

use App\Domain\Team\Enums\TeamRoleEnum;

interface PromoteMemberRequest
{
    public function teamId(): int;
    public function employeeId(): int;
    public function role(): TeamRoleEnum;
}
