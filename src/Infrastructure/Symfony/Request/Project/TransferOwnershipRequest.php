<?php

namespace App\Infrastructure\Symfony\Request\Project;

use App\Infrastructure\Symfony\Request\AbstractRequest;

class TransferOwnershipRequest extends AbstractRequest implements \App\Application\Project\Requests\TransferOwnershipRequest
{

    #[\Override] public function projectId(): int
    {
        // TODO: Implement projectId() method.
    }

    #[\Override] public function newLeaderId(): int
    {
        // TODO: Implement newLeaderId() method.
    }
}