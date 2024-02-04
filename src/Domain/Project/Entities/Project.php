<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Employee\Exceptions\EmployeeNotFoundException;
use App\Domain\Project\Entities\Collections\ProjectMembers;
use App\Domain\Project\Entities\Collections\Releases;
use App\Domain\Project\Enums\ProjectRoleEnum;
use App\Domain\Project\Enums\ProjectStatusEnum;

class Project extends Entity
{
    private function __construct(
        private string $name,
        private string $description,
        private int $currentVersion,
        private ProjectStatusEnum $projectStatusEnum,
        private ProjectMembers $members,
        private Releases $releases,
    ) {
        parent::__construct();
    }

    public static function create(string $name, $description): static
    {
        return new static(
            $name,
            $description,
            0,
            ProjectStatusEnum::PLANNING,
            new ProjectMembers(),
            new Releases()
        );
    }

    public function assignMember(Employee $employee, ProjectRoleEnum $role): void
    {
        $this->members->add(new ProjectMember($this, $employee, $role));
    }

    /**
     * @throws \Exception
     */
    public function createNewRelease(): Release
    {
        if ($this->releases->hasActiveRelease()) {
            throw new \Exception('What are you doing? You already have a release in progress');
        }

        $release = Release::create($this->currentVersion++);

        $this->releases->add($release);

        return $release;
    }

    public function addFeature(Employee $employee, string $description): Feature
    {
        if (!$this->releases->hasActiveRelease()) {
            throw new \Exception('In order to proceed with adding feature, please create active release');
        }

        $feature = new Feature($employee, $description);

        $this->releases->getActiveRelease()->addFeature($feature);

        return $feature;
    }

    public function transferOwnership(int $newOwnerId): void
    {
        $newOwner = $this->members->findByEmployee($newOwnerId);

        if (null === $newOwner) {
            throw new EmployeeNotFoundException($newOwnerId);
        }

        $owner = $this->members->findOwner();

        if ($owner->employee->getId() === $newOwnerId) {
            throw new \Exception('You cannot select new owner');
        }

        $owner->changeRole(ProjectRoleEnum::DEVELOPER);
        $newOwner->changeRole(ProjectRoleEnum::PRODUCT_OWNER);
    }
}
