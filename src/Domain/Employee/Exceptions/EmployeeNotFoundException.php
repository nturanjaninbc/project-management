<?php

namespace App\Domain\Employee\Exceptions;

use Exception;

class EmployeeNotFoundException extends Exception
{

    public function __construct(int $id)
    {
        parent::__construct(sprintf('Employee with id %d was not found', $id));
    }
}
