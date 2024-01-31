<?php

namespace App\Domain\Employee;

use App\Domain\Employee\Entities\Employee;

interface EmployeeRepository
{
    public function save(Employee $employee): void;
    public function find(int $employeeId): Employee | null;
}
