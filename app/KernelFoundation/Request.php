<?php

namespace App\KernelFoundation;

class Request
{
    const METHOD_POST = "POST";
    const METHOD_GET = "GET";
    const METHOD_PUT = "PUT";

    public $parameters;
    public $uri;
    public $method;
    public $cookies;
    public $session;
    public $form;
    public $files;
    public $get;
    public $hostname;

    public function __construct(
        $method, $uri, $hostname,
        ParameterBag $cookies,
        ParameterBag $session,
        ParameterBag $get,
        ParameterBag $form,
        ParameterBag $files
    )
    {
        $this->method = $method;
        $this->cookies = $cookies;
        $this->session = $session;
        $this->hostname = $hostname;
        $this->uri = $uri;
        $this->get = $get;
        $this->form = $form;
        $this->files = $files;
    }

    static function createFromGlobals()
    {
        session_start();

        $method = $_SERVER['REQUEST_METHOD'];

        $form = new ParameterBag($_POST);
        $get = new ParameterBag($_GET);
        $cookies = new ParameterBag($_COOKIE);
        $session = new ParameterBag($_SESSION);
        $files = new ParameterBag($_FILES);

        $uri = rtrim($_SERVER["REQUEST_URI"], '/');
        if ($uri == "") {
            $uri = "/";
        }

        return new static($method, $uri, $_SERVER["SERVER_NAME"], $cookies, $session, $get, $form, $files);
    }

    public function is(string $method): bool
    {
        return strtoupper($this->method) == strtoupper($method);
    }

}