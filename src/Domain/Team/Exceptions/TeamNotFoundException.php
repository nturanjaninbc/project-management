<?php

namespace App\Domain\Team\Exceptions;

use Exception;

class TeamNotFoundException extends Exception
{

    public function __construct(int $id)
    {
        parent::__construct(sprintf('Team with id %d was not found', $id));
    }
}
