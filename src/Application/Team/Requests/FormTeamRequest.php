<?php

namespace App\Application\Team\Requests;

use App\Application\Team\DTO\RequestParams\TeamParams;

interface FormTeamRequest
{
    public function name(): string;
}
