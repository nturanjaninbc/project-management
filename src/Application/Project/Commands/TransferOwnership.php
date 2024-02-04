<?php

namespace App\Application\Project\Commands;

use App\Domain\Project\Exceptions\ProjectNotFoundException;
use App\Domain\Project\ProjectRepository;

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

        $project->transferOwnership($newLeaderId);

        $this->projectRepository->save($project);
    }
}
