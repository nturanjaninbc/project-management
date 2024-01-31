<?php

namespace App\Application\Employee\Requests;

use App\Domain\Project\Enums\ProjectRoleEnum;

interface AssignEmployeeRequest
{
    public function role(): ProjectRoleEnum;
    public function employeeId(): int;
    public function projectId(): int;
}
