<?php

namespace App\KernelFoundation;

class Response
{

    private $http_code;
    private $view;
    private $params;

    public function __construct(string $view, array $params = [], int $http_code = 200)
    {
        $this->http_code = $http_code;
        $this->view = $view;
        $this->params = $params;
    }


    public function send()
    {
    }
}