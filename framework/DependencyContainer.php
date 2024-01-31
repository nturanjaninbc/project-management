<?php

namespace Framework;

readonly class DependencyContainer
{
    private array $services;

    public function __construct()
    {
        $this->services = [];
    }

    public function resolve(string $className): object
    {
        $resolvedDependencies = [];
        if (isset($this->services[$className])) {
            $resolvedDependencies = array_map(function (string $dependency) {
                try {
                    return new $dependency($this->resolve($dependency));
                } catch (\Exception $exception) {
                    throw new \Exception("$dependency is not properly configured");
                }
            }, $this->services[$className]);
        }

        return new $className(...$resolvedDependencies);
    }
}
