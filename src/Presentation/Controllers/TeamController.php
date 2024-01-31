<?php

namespace App\Presentation\Controllers;

use App\Application\Shipments\Commands\FormTeam;
use App\Application\Shipments\Commands\HireMember;
use App\Application\Shipments\Commands\PromoteMember;
use App\Application\Team\Requests\FormTeamRequest;
use App\Application\Team\Requests\HireMemberRequest;
use App\Application\Team\Requests\PromoteMemberRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class TeamController
{
    public function __construct(
        private readonly FormTeam $formTeamCommand,
        private readonly HireMember $hireMemberCommand,
        private readonly PromoteMember $promoteMemberCommand,
    ) {
    }

    public function formTeam(FormTeamRequest $request): JsonResponse
    {
        $this->formTeamCommand->handle($request->name());

        return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
    }

    public function hireMember(HireMemberRequest $request): JsonResponse
    {
        $this->hireMemberCommand->handle($request->teamId(), $request->employeeParams());

        return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
    }

    public function promoteMember(PromoteMemberRequest $request): JsonResponse
    {
        $this->promoteMemberCommand->handle(
            $request->teamId(),
            $request->employeeId(),
            $request->role()
        );

        return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
    }
}
