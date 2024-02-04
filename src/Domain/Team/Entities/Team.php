<?php

namespace App\Domain\Team\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Team\Entities\Collections\TeamMembers;
use App\Domain\Team\Enums\TeamRoleEnum;

class Team extends Entity
{
    private function __construct(private readonly string $name, private readonly TeamMembers $members)
    {
        parent::__construct();
    }

    public static function create(string $name): static
    {
        return static(
            $name,
            new TeamMembers()
        );
    }

    public function hire(Employee $employee, TeamRoleEnum $role): void
    {
        if ($this->members->find($employee->getId())) {
            throw new \Exception('Employee already hired in this team');
        }

        $this->members->add(new TeamMember($this, $employee, $role));
    }

    public function promote(int $employeeId, TeamRoleEnum $role): void
    {
        $teamMember = $this->members->find($employeeId);

        if (null === $teamMember) {
            throw new \Exception('This employee does not belong to this team');
        }

        if ($teamMember->role() === $role) {
            throw new \Exception("Team member is already $role->value");
        }

        $teamMember->promote($role);
    }
}
