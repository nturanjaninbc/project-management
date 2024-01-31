<?php

namespace App\Infrastructure\Symfony\Request\Team;

use App\Application\Employee\DTO\RequestParams\EmployeeParams;
use App\Infrastructure\Symfony\Request\AbstractRequest;

class HireMemberRequest extends AbstractRequest implements \App\Application\Team\Requests\HireMemberRequest
{

    #[\Override] public function teamId(): string
    {
        // TODO: Implement teamId() method.
    }

    #[\Override] public function employeeParams(): EmployeeParams
    {
        // TODO: Implement employeeParams() method.
    }
}
