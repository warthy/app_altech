<?php


namespace App\Component;


use App\KernelFoundation\Request;

abstract class Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function getRequest(): Request
    {
        return $this->request;
    }

    protected function getUser()
    {
        //TODO: Return user
    }
}