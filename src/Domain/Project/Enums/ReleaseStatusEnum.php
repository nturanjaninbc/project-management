<?php

namespace App\Domain\Project\Enums;

enum ReleaseStatusEnum: string
{
    case PENDING = 'pending';
    case DEPLOYED = 'deployed';
    case IN_PROGRESS = 'inProgress';
}