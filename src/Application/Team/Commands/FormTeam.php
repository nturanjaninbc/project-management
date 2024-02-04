<?php

namespace App\Application\Team\Commands;

use App\Domain\Team\Entities\Team;
use App\Domain\Team\TeamRepository;

class FormTeam
{
    public function __construct(private readonly TeamRepository $teamRepository)
    {
    }

    public function handle(string $name): void
    {
        $this->teamRepository->save(Team::create($name));
    }
}
