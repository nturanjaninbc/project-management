<?php

namespace App\Infrastructure\Symfony\Request;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractRequest
{
    protected Request $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }
}