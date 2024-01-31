<?php

namespace App\Application\Team\Requests;

use App\Application\Employee\DTO\RequestParams\EmployeeParams;

interface HireMemberRequest
{
    public function teamId(): string;
    public function employeeParams(): EmployeeParams;
}
