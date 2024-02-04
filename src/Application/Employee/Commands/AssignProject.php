<?php

namespace App\Application\Employee\Commands;

use App\Domain\Employee\Exceptions\EmployeeNotFoundException;
use App\Domain\Project\Enums\ProjectRoleEnum;
use App\Domain\Project\Exceptions\ProjectNotFoundException;
use App\Domain\Project\ProjectRepository;
use App\Domain\Employee\EmployeeRepository;

class AssignProject
{
    public function __construct(
        private readonly EmployeeRepository $employeeRepository,
        private readonly ProjectRepository $projectRepository
    ) {
    }

    /**
     * @throws EmployeeNotFoundException
     * @throws ProjectNotFoundException
     */
    public function handle(int $employeeId, int $projectId, ProjectRoleEnum $role): void
    {
        $employee = $this->employeeRepository->find($employeeId);

        if (null === $employee) {
            throw new EmployeeNotFoundException($employeeId);
        }

        $project = $this->projectRepository->find($projectId);

        if (null === $project) {
            throw new ProjectNotFoundException($projectId);
        }

        $project->assignMember($employee, $role);

        $this->projectRepository->save($project);
    }
}
