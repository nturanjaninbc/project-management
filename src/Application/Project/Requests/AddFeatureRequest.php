<?php

namespace App\Application\Project\Requests;

interface AddFeatureRequest
{
    public function description(): string;
    public function employeeId(): int;
    public function projectId(): int;
}
