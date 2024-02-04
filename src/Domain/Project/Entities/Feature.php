<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;

class Feature extends Entity
{

    public function __construct(
        private Employee $employee,
        private string $description,
    ) {
        parent::__construct();
    }
}
