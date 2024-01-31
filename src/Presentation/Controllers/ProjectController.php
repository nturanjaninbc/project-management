<?php

namespace App\Presentation\Controllers;

use App\Application\Project\Requests\AddFeatureRequest;
use App\Application\Project\Commands\AddFeature;
use App\Application\Project\Commands\MakeRelease;
use App\Application\Project\Commands\TransferOwnership;
use App\Application\Project\Requests\TransferOwnershipRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProjectController
{
    public function __construct(
        private readonly AddFeature $addFeatureCommand,
        private readonly MakeRelease $makeReleaseCommand,
        private readonly TransferOwnership $transferOwnershipCommand,
    ) {
    }

    public function addFeature(AddFeatureRequest $request): JsonResponse
    {
        return new JsonResponse(
            $this->addFeatureCommand->handle(
                $request->projectId(),
                $request->employeeId(),
                $request->description()
            )
        );
    }

    public function makeRelease(AddFeatureRequest $request): JsonResponse
    {
        return new JsonResponse($this->makeReleaseCommand->handle($request->projectId()));
    }

    public function transferLeadership(TransferOwnershipRequest $request): JsonResponse
    {
        $this->transferOwnershipCommand->handle($request->projectId(), $request->newLeaderId());

        return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
    }
}
