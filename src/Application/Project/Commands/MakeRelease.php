<?php

namespace App\Application\Project\Commands;

use App\Domain\Project\Entity\Release;
use App\Domain\Project\Enums\ReleaseStatusEnum;
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

        if ($project->getReleases()->hasActiveRelease()) {
            throw new \Exception('What are you doing? You already have a release in progress');
        }

        $release = new Release();
        $release->setStatus(ReleaseStatusEnum::IN_PROGRESS);
        $release->setCreatedAt(new \DateTimeImmutable());
        $release->setVersion($project->getCurrentVersion() + 1);

        $project->getReleases()->add($release);

        $this->projectRepository->save($project);

        return $release;
    }
}
