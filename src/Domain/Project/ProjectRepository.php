<?php

namespace App\Domain\Project;

use App\Domain\Project\Entities\Project;

interface ProjectRepository
{
    public function save(Project $project): void;
    public function find(int $projectId): Project | null;
}
