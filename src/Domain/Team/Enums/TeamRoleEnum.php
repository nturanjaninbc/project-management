<?php

namespace App\Domain\Team\Enums;

enum TeamRoleEnum: string
{
    case TEAM_LEAD = 'teamLead';
    case DEVELOPER = 'developer';
}