<?php

namespace App\Domain\Abstraction;

abstract class Entity
{
    private readonly int $id;

    public function __construct()
    {
        $this->id = rand(0, 10000);
    }

    public function getId(): int
    {
        return $this->id;
    }
}