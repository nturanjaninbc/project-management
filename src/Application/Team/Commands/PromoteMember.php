<?php

namespace App\Application\Shipments\Commands;

use App\Domain\Team\Enums\TeamRoleEnum;
use App\Domain\Team\Exceptions\TeamNotFoundException;
use App\Domain\Team\TeamRepository;

class PromoteMember
{
    public function __construct(private readonly TeamRepository $teamRepository)
    {
    }

    public function handle(int $teamId, int $employeeId, TeamRoleEnum $role): void
    {
        $team = $this->teamRepository->find($teamId);

        if (null === $team) {
            throw new TeamNotFoundException($teamId);
        }

        $teamMember = $team->getMembers()->find($employeeId);

        if (null === $teamMember) {
            throw new \Exception('This employee does not belong to this team');
        }

        if ($teamMember->getRole() === $role) {
            throw new \Exception("Team member is already $role->value");
        }

        $teamMember->setRole($role);

        $this->teamRepository->save($team);
    }
}
