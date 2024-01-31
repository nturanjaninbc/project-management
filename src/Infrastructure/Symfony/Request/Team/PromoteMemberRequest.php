<?php

namespace App\Infrastructure\Symfony\Request\Team;

use App\Domain\Team\Enums\TeamRoleEnum;
use App\Infrastructure\Symfony\Request\AbstractRequest;

class PromoteMemberRequest extends AbstractRequest implements \App\Application\Team\Requests\PromoteMemberRequest
{

    #[\Override] public function teamId(): int
    {
        // TODO: Implement teamId() method.
    }

    #[\Override] public function employeeId(): int
    {
        // TODO: Implement employeeId() method.
    }

    #[\Override] public function role(): TeamRoleEnum
    {
        // TODO: Implement role() method.
    }
}
