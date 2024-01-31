<?php

namespace App\Domain\Team\Entities\Collections;

use App\Domain\Team\Entities\TeamMember;

class TeamMembers
{
    private array $members = [];

    public function __construct(TeamMember ...$members)
    {
        foreach ($members as $member) {
            $this->members[$member->getEmployee()->getId()] = $member;
        }
    }

    public function add(TeamMember $member): void
    {
        $this->members[$member->getEmployee()->getId()] = $member;
    }

    public function remove(TeamMember $member): void
    {
        unset($this->members[$member->getEmployee()->getId()]);
    }

    public function find(int $id): TeamMember | null
    {
        if (!isset($this->members[$id])) {
            return null;
        }

        return $this->members[$id];
    }
}
