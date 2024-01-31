<?php

namespace App\Domain\Team;

use App\Domain\Team\Entities\Team;

interface TeamRepository
{
    public function save(Team $team): void;
    public function find(int $teamId): Team | null;
}
