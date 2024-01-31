<?php

namespace App\Domain\Employee\Enums;

enum EmployeeStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}