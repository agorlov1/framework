<?php


namespace somecode\Framework\Routing;

use somecode\Framework\http\Request;

interface RouterInterface
{
 public function dispatch(Request $request);
}