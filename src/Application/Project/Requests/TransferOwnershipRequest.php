<?php

namespace App\Application\Project\Requests;

interface TransferOwnershipRequest
{
    public function projectId(): int;
    public function newLeaderId(): int;
}
