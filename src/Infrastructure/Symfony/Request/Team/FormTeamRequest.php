<?php

namespace App\Infrastructure\Symfony\Request\Team;

use App\Infrastructure\Symfony\Request\AbstractRequest;

class FormTeamRequest extends AbstractRequest implements \App\Application\Team\Requests\FormTeamRequest
{

    #[\Override] public function name(): string
    {
        // TODO: Implement name() method.
    }
}
