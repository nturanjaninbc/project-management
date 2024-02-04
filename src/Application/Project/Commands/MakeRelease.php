<?php

namespace App\Application\Project\Commands;

use App\Domain\Project\Entities\Release;
use App\Domain\Project\Exceptions\ProjectNotFoundException;
use App\Domain\Project\ProjectRepository;

class MakeRelease
{
    public function __construct(private readonly ProjectRepository $projectRepository)
    {
    }

    public function handle(int $projectId): Release
    {
        $project = $this->projectRepository->find($projectId);

        if (null === $project) {
            throw new ProjectNotFoundException($projectId);
        }

        $release = $project->createNewRelease();

        $this->projectRepository->save($project);

        return $release;
    }
}
