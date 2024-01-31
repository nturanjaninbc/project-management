<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Entities\Employee;

class Feature extends Entity
{
    private string $description;
    private Employee $employee;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEmployee(): Employee
    {
        return $this->employee;
    }

    public function setEmployee(Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }
}