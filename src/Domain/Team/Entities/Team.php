<?php

namespace App\Domain\Team\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Team\Entities\Collections\TeamMembers;

class Team extends Entity
{
    private string $name;
    private TeamMembers $members;

    public function __construct()
    {
        parent::__construct();

        $this->members = new TeamMembers();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMembers(): TeamMembers
    {
        return $this->members;
    }

    public function setMembers(TeamMembers $members): void
    {
        $this->members = $members;
    }
}
