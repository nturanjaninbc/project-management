<?php

namespace App\Application\Team\Commands;

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

        $team->promote($employeeId, $role);

        $this->teamRepository->save($team);
    }
}
