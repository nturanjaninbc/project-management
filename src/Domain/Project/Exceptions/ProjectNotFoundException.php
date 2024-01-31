<?php

namespace App\Domain\Project\Exceptions;

use Exception;

class ProjectNotFoundException extends Exception
{

    public function __construct(int $id)
    {
        parent::__construct(sprintf('Project with id %d was not found', $id));
    }
}
