<?php

namespace App\Infrastructure\Symfony\Request\Project;

use App\Infrastructure\Symfony\Request\AbstractRequest;

class AddFeatureRequest extends AbstractRequest implements \App\Application\Project\Requests\AddFeatureRequest
{

    #[\Override] public function description(): string
    {
        // TODO: Implement description() method.
    }

    #[\Override] public function employeeId(): int
    {
        // TODO: Implement employeeId() method.
    }

    #[\Override] public function projectId(): int
    {
        // TODO: Implement projectId() method.
    }
}