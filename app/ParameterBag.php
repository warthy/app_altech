<?php


class ParameterBag
{

    private $parameters = [];

    public function __construct(array $data)
    {
        $this->parameters = $data;
    }

    public function __call(string $name, $arg)
    {
        switch ($name){
            case "get":
                if(is_string($arg)){
                    return isset($this->parameters[$arg]) ? $this->parameters[$arg]: null;
                }
                throw new Exception("Argument needs to be a string");
            default:
                throw new Exception("Unvalid method call.");

        }
    }
}