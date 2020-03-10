<?php


namespace App\Component;


abstract class View
{
    const PATH_TO_VIEWS = __DIR__ . '/../../src/View';

    static function extends(string $pathname)
    {
        ob_start();
        require $pathname;
        return ob_get_clean();
    }


}