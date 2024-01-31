<?php

namespace App\Domain\Project\Entities\Collections;

use App\Domain\Project\Entity\Release;
use App\Domain\Project\Enums\ReleaseStatusEnum;

class Releases
{
    private array $releases = [];

    public function __construct(Release ...$releases)
    {
        $this->releases = $releases;
    }

    public function add(Release $release): void
    {
        $this->releases[] = $release;
    }

    public function hasActiveRelease(): bool
    {
        return count(array_filter(
            $this->releases,
            fn(Release $release) => $release->getStatus() === ReleaseStatusEnum::IN_PROGRESS
        )) > 0;
    }

    public function getActiveRelease(): Release
    {
        return array_filter(
            $this->releases,
            fn(Release $release) => $release->getStatus() === ReleaseStatusEnum::IN_PROGRESS
        )[0];
    }
}
