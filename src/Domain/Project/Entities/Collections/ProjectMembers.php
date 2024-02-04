<?php

namespace App\Domain\Project\Entities\Collections;

use App\Domain\Project\Entities\ProjectMember;
use App\Domain\Project\Enums\ProjectRoleEnum;

class ProjectMembers
{
    private array $members = [];

    public function __construct(ProjectMember ...$members)
    {
        foreach ($members as $member) {
            $this->members[$member->getId()] = $member;
        }
    }

    public function add(ProjectMember $member): void
    {
        $this->members[$member->getId()] = $member;
    }

    public function remove(ProjectMember $member): void
    {
        unset($this->members[$member->getId()]);
    }

    public function findOwner(): ProjectMember | null
    {
        $projectOwners = array_filter(
            $this->members,
            fn(ProjectMember $member) => $member->getRole() === ProjectRoleEnum::PRODUCT_OWNER
        );

        if (count($projectOwners) === 0) {
            return null;
        }

        return $projectOwners[0];
    }

    public function findByEmployee(int $employeeId): ProjectMember | null
    {
        return array_filter(
            $this->members,
            fn(ProjectMember $member) => $member->employee->getId() === $employeeId
        )[0] ?? null;
    }
}
