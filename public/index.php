<?php

use App\KernelFoundation\Kernel;
use App\KernelFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

$request  = Request::createFromGlobals();
$kernel = new Kernel();

$response = $kernel->handle($request);
$response->send();


// Get Controller

// Call controller methods

// Return response