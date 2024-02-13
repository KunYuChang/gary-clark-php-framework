<?php

declare(strict_types=1);

use GaryClarke\Framework\Http\Kernel;
use GaryClarke\Framework\Http\Request;
use GaryClarke\Framework\Http\Response;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request 
$request = Request::createFromGlobals();

// logic 

// response 
// $content = '<h1>Hello World</h1>';
// $response = new Response(content: $content, status: 200, headers: []);
// $response->send();

$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();