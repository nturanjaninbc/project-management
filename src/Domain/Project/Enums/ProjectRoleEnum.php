<?php

namespace App\Domain\Project\Enums;

enum ProjectRoleEnum: string
{
    case PRODUCT_OWNER = 'productOwner';
    case DEVELOPER = 'developer';
    case PROJECT_MANAGER = 'projectManager';
}