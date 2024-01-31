<?php

namespace App\Domain\Project\Enums;

enum ProjectStatusEnum: string
{
    case PLANNING = 'planning';
    case DEVELOPMENT = 'development';
    case MAINTENANCE = 'maintenance';
}