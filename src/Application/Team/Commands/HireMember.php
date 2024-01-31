<?php

namespace App\Application\Shipments\Commands;

use App\Application\Employee\DTO\RequestParams\EmployeeParams;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Employee\Enums\EmployeeStatusEnum;
use App\Domain\Team\Entities\TeamMember;
use App\Domain\Team\Exceptions\TeamNotFoundException;
use App\Domain\Team\TeamRepository;

class HireMember
{
    public function __construct(private readonly TeamRepository $teamRepository)
    {
    }

    public function handle(int $teamId, EmployeeParams $params)
    {
        $team = $this->teamRepository->find($teamId);

        if (null === $team) {
            throw new TeamNotFoundException($teamId);
        }

        $employee = new Employee();
        $employee->setName($params->name);
        $employee->setActivePosition($params->position);
        $employee->setSalary($params->salary);
        $employee->setStatus(EmployeeStatusEnum::ACTIVE);

        $teamMember = new TeamMember();
        $teamMember->setTeam($team);
        $teamMember->setEmployee($employee);
        $teamMember->setRole($params->role);

        $team->getMembers()->add($teamMember);

        $this->teamRepository->save($team);
    }
}
