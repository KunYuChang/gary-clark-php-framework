<?php

declare(strict_types=1);

use GaryClarke\Framework\Http\Kernel;
use GaryClarke\Framework\Http\Request;
use GaryClarke\Framework\Http\Response;
use GaryClarke\Framework\Routing\Router;

define('BASE_PATH', dirname(__DIR__));

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request 
$request = Request::createFromGlobals();

$router = new Router();
$kernel = new Kernel($router);

$response = $kernel->handle($request);
$response->send();