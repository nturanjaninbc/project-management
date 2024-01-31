<?php

namespace App\Application\Shipments\Commands;

use App\Domain\Team\Entities\Team;
use App\Domain\Team\TeamRepository;

class FormTeam
{
    public function __construct(private readonly TeamRepository $teamRepository)
    {
    }

    public function handle(string $name)
    {
        $team = new Team();
        $team->setName($name);

        $this->teamRepository->save($team);
    }
}
