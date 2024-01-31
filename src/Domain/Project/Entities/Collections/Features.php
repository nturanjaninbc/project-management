<?php

namespace App\Domain\Project\Entities\Collections;

use App\Domain\Project\Entities\Feature;

class Features
{
    private array $features = [];

    public function __construct(Feature ...$features)
    {
        foreach ($features as $feature) {
            $this->features[$feature->getId()] = $feature;
        }
    }

    public function add(Feature $feature): void
    {
        $this->features[$feature->getId()] = $feature;
    }

    public function remove(Feature $feature): void
    {
        unset($this->features[$feature->getId()]);
    }
}
