<?php

namespace App\Application\Project\Requests;

interface MakeReleaseRequest
{
    public function projectId(): int;
}
