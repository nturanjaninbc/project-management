<?php

namespace Framework;

use App\Application\Shipments\Commands\ShipmentCommand;
use Framework\DependencyContainer;
use Framework\DTO\RouteAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

readonly class App
{
    private DependencyContainer $container;

    public function __construct()
    {
        $this->container = new DependencyContainer();
    }

    public static function createApp(): App
    {
        session_start();

        return new App;
    }

    public function process(): JsonResponse
    {
        header("Content-Type: application/json; charset=UTF-8");

        return $this->routeRequest(Request::createFromGlobals());
    }

    /**
     * @throws \Exception
     */
    private function routeRequest(Request $request): JsonResponse
    {
        $action = $this->matchRequest($request);

        return ($this->container->resolve($action->controller))->{$action->method}($request);
    }

    private function matchRequest(Request $request): RouteAction
    {
        $route = $request->getPathInfo();
        return match ($route) {
            '/project/:projectId/employees/:employeeId/assign' => new RouteAction(ShipmentCommand::class, 'try'),
            '/project/:projectId/employees/:employeeId/assign' => new RouteAction(ShipmentCommand::class, 'try'),
        };
    }
}