<?php

namespace App\Infrastructure\Symfony\Request\Employee;

use App\Domain\Project\Enums\ProjectRoleEnum;
use App\Infrastructure\Symfony\Request\AbstractRequest;

class AssignEmployeeRequest extends AbstractRequest implements \App\Application\Employee\Requests\AssignEmployeeRequest
{

    #[\Override] public function role(): ProjectRoleEnum
    {
        // TODO: Implement role() method.
    }

    #[\Override] public function employeeId(): int
    {
        // TODO: Implement employeeId() method.
    }

    #[\Override] public function projectId(): int
    {
        // TODO: Implement projectId() method.
    }
}