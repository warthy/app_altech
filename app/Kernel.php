<?php


class Kernel
{
    private $request;
    private $router;

    public function __construct()
    {

    }

    public function handle(Request $request){
        $this->request = $request;
        $this->router = Router::getInstance($request);

        $this->router->dispatch();
    }
}