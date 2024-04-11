<?php

define('BASE_PATH', dirname(__DIR__));

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/vendor/larapack/dd/src/helper.php';

// https://mail.yandex.ru/?from=tableau_yabro&uid=13549553#message/185492009652408970
// AreaWeb

use somecode\Framework\http\Kernel;
use somecode\Framework\http\Request;
use somecode\Framework\Routing\Router;

$request = Request::createFromGlobals();
$router = new Router();
$kernel = new Kernel($router);
$response = $kernel->handle($request);
//dd($response );
$response->send();
