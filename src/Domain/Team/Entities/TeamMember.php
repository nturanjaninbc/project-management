<?php

namespace App\Domain\Team\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Team\Enums\TeamRoleEnum;

class TeamMember extends Entity
{
    public function __construct(
        private Team $team,
        private Employee $employee,
        private TeamRoleEnum $role,
    ) {
        parent::__construct();
    }

    public function role(): TeamRoleEnum
    {
        return $this->role;
    }

    public function promote(TeamRoleEnum $role): void
    {
        //determine if the role is indeed a promotion based on previous
        if (!$this->isItReallyPromotion($this->role, $role)) {
            throw new \Exception('This is not a promotion :/');
        }

        $this->role = $role;
    }

    private function isItReallyPromotion(TeamRoleEnum $previous, TeamRoleEnum $next): bool
    {
        return $previous === TeamRoleEnum::DEVELOPER && $next === TeamRoleEnum::TEAM_LEAD;
    }
}
