<?php

namespace App\Application\Team\Commands;

use App\Application\Employee\DTO\RequestParams\EmployeeParams;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Team\Exceptions\TeamNotFoundException;
use App\Domain\Team\TeamRepository;

class HireMember
{
    public function __construct(private readonly TeamRepository $teamRepository)
    {
    }

    public function handle(int $teamId, EmployeeParams $params): void
    {
        $team = $this->teamRepository->find($teamId);

        if (null === $team) {
            throw new TeamNotFoundException($teamId);
        }

        $employee = Employee::create(
            $params->name,
            $params->position,
            $params->salary
        );

        $team->hire($employee, $params->role);

        $this->teamRepository->save($team);
    }
}
