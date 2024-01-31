<?php

namespace App\Domain\Project\Entity;

use App\Domain\Abstraction\Entity;
use App\Domain\Project\Entities\Collections\Features;
use DateTimeImmutable;
use App\Domain\Project\Enums\ReleaseStatusEnum;

class Release extends Entity
{
    private string $version;
    private Features $features;

    private ReleaseStatusEnum $status;

    private DateTimeImmutable $createdAt;

    public function __construct()
    {
        parent::__construct();

        $this->features = new Features();
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getStatus(): ReleaseStatusEnum
    {
        return $this->status;
    }

    public function setStatus(ReleaseStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFeatures(): Features
    {
        return $this->features;
    }

    public function setFeatures(Features $features): static
    {
        $this->features = $features;

        return $this;
    }
}