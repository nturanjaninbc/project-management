<?php

namespace App\Application\Project\Commands;

use App\Domain\Employee\Exceptions\EmployeeNotFoundException;
use App\Domain\Project\Enums\ProjectRoleEnum;
use App\Domain\Project\Exceptions\ProjectNotFoundException;
use App\Domain\Project\ProjectRepository;
use App\Domain\Employee\EmployeeRepository;

class TransferOwnership
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
    ) {
    }

    public function handle(int $projectId, int $newLeaderId): void
    {
        $project = $this->projectRepository->find($projectId);

        if (null === $project) {
            throw new ProjectNotFoundException($projectId);
        }

        $newOwner = $project->getMembers()->findByEmployee($newLeaderId);

        if (null === $newOwner) {
            throw new EmployeeNotFoundException($employeeId);
        }

        $owner = $project->getMembers()->findLeader();

        if (!($owner === null || $owner->getEmployee()->getId() === $newOwner->getId())) {
            throw new \Exception('You cannot select new owner');
        }

        $owner->setRole(ProjectRoleEnum::DEVELOPER);
        $newOwner->setRole(ProjectRoleEnum::PRODUCT_OWNER);

        $this->projectRepository->save($project);
    }
}
