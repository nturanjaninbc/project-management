<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;
use App\Domain\Project\Enums\ProjectRoleEnum;

class ProjectMember extends Entity
{
    public function __construct(
        public readonly Project $project,
        public readonly Employee $employee,
        private ProjectRoleEnum $role,
    ) {
        parent::__construct();
    }

    public function role(): ProjectRoleEnum
    {
        return $this->role;
    }

    public function changeRole(ProjectRoleEnum $role): void
    {
        $this->role = $role;
    }
}
