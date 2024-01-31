<?php

namespace App\Domain\Employee\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Enums\EmployeeStatusEnum;

class Employee extends Entity
{
    private string $name;
    private string $activePosition;
    private int $salary;
    private EmployeeStatusEnum $status;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getActivePosition(): string
    {
        return $this->activePosition;
    }

    public function setActivePosition(string $activePosition): void
    {
        $this->activePosition = $activePosition;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getStatus(): EmployeeStatusEnum
    {
        return $this->status;
    }

    public function setStatus(EmployeeStatusEnum $status): void
    {
        $this->status = $status;
    }
}