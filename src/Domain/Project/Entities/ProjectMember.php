<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Project\Enums\ProjectRoleEnum;

class ProjectMember extends Entity
{
    private Project $project;
    private Employee $employee;
    private ProjectRoleEnum $role;

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): static
    {
        $this->project = $project;

        return $this;
    }

    public function getEmployee(): Employee
    {
        return $this->employee;
    }

    public function setEmployee(Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }

    public function getRole(): ProjectRoleEnum
    {
        return $this->role;
    }

    public function setRole(ProjectRoleEnum $role): void
    {
        $this->role = $role;
    }
}
