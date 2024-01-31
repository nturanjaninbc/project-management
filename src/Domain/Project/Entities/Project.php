<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Project\Entities\Collections\ProjectMembers;
use App\Domain\Project\Entities\Collections\Releases;
use App\Domain\Project\Enums\ProjectStatusEnum;

class Project extends Entity
{
    private string $name;
    private string $description;
    private int $currentVersion;
    private ProjectMembers $members;
    private ProjectStatusEnum $projectStatusEnum;
    private Releases $releases;

    public function __construct()
    {
        parent::__construct();

        $this->members = new ProjectMembers();
        $this->realeases = new Releases();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMembers(): ProjectMembers
    {
        return $this->members;
    }

    public function setMembers(ProjectMembers $members): void
    {
        $this->members = $members;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getProjectStatusEnum(): ProjectStatusEnum
    {
        return $this->projectStatusEnum;
    }

    public function setProjectStatusEnum(ProjectStatusEnum $projectStatusEnum): void
    {
        $this->projectStatusEnum = $projectStatusEnum;
    }

    public function getCurrentVersion(): int
    {
        return $this->currentVersion;
    }

    public function setCurrentVersion(int $currentVersion): void
    {
        $this->currentVersion = $currentVersion;
    }

    public function getReleases(): Releases
    {
        return $this->releases;
    }

    public function setReleases(Releases $releases): void
    {
        $this->releases = $releases;
    }
}
