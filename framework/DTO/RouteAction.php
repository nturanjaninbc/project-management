<?php

namespace Framework\DTO;

readonly class RouteAction
{
    public function __construct(
        public string $controller,
        public string $method
    ) {
    }
}
