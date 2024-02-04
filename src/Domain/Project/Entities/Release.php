<?php

namespace App\Domain\Project\Entities;

use App\Domain\Abstraction\Entity;
use App\Domain\Project\Entities\Collections\Features;
use App\Domain\Project\Entities\Collections\Releases;
use DateTimeImmutable;
use App\Domain\Project\Enums\ReleaseStatusEnum;

class Release extends Entity
{
    private function __construct(
        private int $version,
        private Features $features,
        private ReleaseStatusEnum $status,
        private DateTimeImmutable $createdAt,
    ) {
        parent::__construct();
    }

    public static function create(
        int $version,
    ): static {
        return new static(
            $version,
            new Features(),
            ReleaseStatusEnum::IN_PROGRESS,
            new DateTimeImmutable()
        );
    }

    public function addFeature(Feature $feature)
    {
        if ($this->status !== ReleaseStatusEnum::IN_PROGRESS) {
            throw new \Exception('Release you are trying to update is not in progress!');
        }

        $this->features->add($feature);
    }

    public function status(): ReleaseStatusEnum
    {
        return $this->status;
    }
}
