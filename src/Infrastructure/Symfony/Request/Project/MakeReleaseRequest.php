<?php

namespace App\Infrastructure\Symfony\Request\Project;

use App\Infrastructure\Symfony\Request\AbstractRequest;

class MakeReleaseRequest extends AbstractRequest implements \App\Application\Project\Requests\MakeReleaseRequest
{

    #[\Override] public function projectId(): int
    {
        // TODO: Implement projectId() method.
    }
}