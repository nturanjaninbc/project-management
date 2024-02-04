<?php

namespace App\Application\Project\Commands;

use App\Domain\Employee\Exceptions\EmployeeNotFoundException;
use App\Domain\Project\Entities\Feature;
use App\Domain\Project\Exceptions\ProjectNotFoundException;
use App\Domain\Project\ProjectRepository;
use App\Domain\Employee\EmployeeRepository;

class AddFeature
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
        private readonly EmployeeRepository $employeeRepository,
    ) {
    }

    public function handle(int $projectId, int $employeeId, string $description): Feature
    {
        $project = $this->projectRepository->find($projectId);

        if (null === $project) {
            throw new ProjectNotFoundException($projectId);
        }

        $employee = $this->employeeRepository->find($employeeId);

        if (null === $employee) {
            throw new EmployeeNotFoundException($employeeId);
        }

        $feature = $project->addFeature($employee, $description);

        return $feature;
    }
}
