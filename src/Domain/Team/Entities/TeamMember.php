<?php

namespace App\Domain\Team\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Team\Entities\Team;
use App\Domain\Team\Enums\TeamRoleEnum;

class TeamMember extends Entity
{
    private Employee $employee;
    private Team $team;
    private TeamRoleEnum $role;

    public function getEmployee(): Employee
    {
        return $this->employee;
    }

    public function setEmployee(Employee $employee): void
    {
        $this->employee = $employee;
    }

    public function getTeam(): Team
    {
        return $this->team;
    }

    public function setTeam(Team $team): void
    {
        $this->team = $team;
    }

    public function getRole(): TeamRoleEnum
    {
        return $this->role;
    }

    public function setRole(TeamRoleEnum $role): void
    {
        $this->role = $role;
    }
}
