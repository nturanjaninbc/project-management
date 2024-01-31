<?php

namespace App\Presentation\Controllers;

use App\Application\Employee\Commands\AssignProject;
use App\Application\Employee\Requests\AssignEmployeeRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmployeeController
{
    public function __construct(
        private readonly AssignProject $assignProjectCommand
    ) {
    }

    public function assignProject(AssignEmployeeRequest $request): JsonResponse
    {
        $this->assignProjectCommand->handle(
            $request->employeeId(),
            $request->projectId(),
            $request->role()
        );

        return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
    }
}
