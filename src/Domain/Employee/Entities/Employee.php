<?php

namespace App\Domain\Employee\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Employee\Enums\EmployeeStatusEnum;
use App\Domain\Employee\VO\Salary;

/**
 * Methods here are not used anywhere, it's a solid example of future expansion of the domain.
 */
class Employee extends Entity
{
    private function __construct(
        private string $name,
        private ?string $activePosition,
        private Salary $salary,
        private EmployeeStatusEnum $status
    ) {
        parent::__construct();
    }

    /**
     * @throws \Exception
     */
    public static function create(
        string $name,
        string $activePosition,
        int $salary
    ): static {
        return new static(
            $name,
            $activePosition,
            new Salary($salary),
            EmployeeStatusEnum::ACTIVE
        );
    }

    public function promote(string $newPosition, int $newSalary): void
    {
        if (!$this->salary->greaterThan($newSalary)) {
            throw new \Exception('Srpski gazda, is that you?');
        }

        $this->activePosition = $newPosition;
        $this->salary = new Salary($newSalary);
    }

    public function fire(): void
    {
        if ($this->status !== EmployeeStatusEnum::INACTIVE) {
            throw new \Exception('We have already did this!');
        }

        $this->activePosition = null;
        $this->status = EmployeeStatusEnum::INACTIVE;
    }

    public function isActive(): bool
    {
        return $this->status === EmployeeStatusEnum::ACTIVE;
    }
}
