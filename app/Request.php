<?php


class Request
{
    public $parameters;
    public $uri;
    public $method;
    public $cookies;
    public $session;
    public $hostname;

    public function __construct(string $method, string $uri, array $cookies, array $session, string $hostname)
    {
        $this->method = $method;
        $this->cookies = $cookies;
        $this->session = $session;
        $this->hostname = $hostname;
        $this->uri = $uri;
    }

    static function createFromGlobals()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method){
            case "GET":
                break;
            case "POST":

                break;
        }


        return new static($method, $_SERVER["REQUEST_URI"], $_COOKIE, $_SESSION, $_SERVER["SERVER_NAME"]);
    }
}