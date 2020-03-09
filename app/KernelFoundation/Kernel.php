<?php

namespace App\KernelFoundation;

class Kernel {

    private $request;
    private $router;

    public function __construct()
    {

    }

    public function handle(Request $request): Response
    {
        $this->request = $request;
        Router::GenerateRoutes();
        $this->router = Router::getInstance($request);

        return $this->router->dispatch();
    }
}