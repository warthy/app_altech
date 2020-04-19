<?php

use App\KernelFoundation\Kernel;
use App\KernelFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

$request  = Request::createFromGlobals();
$kernel = new Kernel();

// Remove comment when deploying to prod
//set_exception_handler([$kernel, 'handleException']);

$response = $kernel->handle($request);
$response->send();
