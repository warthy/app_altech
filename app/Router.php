<?php


class Router
{
    private static $_instance = null;

    public function __construct(Request $request)
    {

    }

    public function dispatch(): array
    {

    }


    public static function getInstance(Request $req): self
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new Router($req);
        }

        return self::$_instance;
    }
}