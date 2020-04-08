<?php
namespace App\KernelFoundation;

use Exception;

class ParameterBag
{

    private $parameters = [];

    public function __construct(array $data = [])
    {
        $this->parameters = $data;
    }

    public function __call(string $name, $args)
    {
        switch ($name){
            case "get":
                return isset($this->parameters[$args[0]]) ? $this->parameters[$args[0]]: null;
            default:
                throw new Exception("Unvalid method call.");

        }
    }
}