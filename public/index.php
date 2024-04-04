<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/vendor/larapack/dd/src/helper.php';

use somecode\Framework\http\Kernel;
use somecode\Framework\http\Request;

$request = Request::createFromGlobals();
$kernel = new Kernel();
$response = $kernel->handle($request);
//dd($request->getGetname())
$response->send();
