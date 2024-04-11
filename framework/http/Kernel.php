<?php

namespace somecode\Framework\http;

use somecode\Framework\Routing\RouterInterface;

class Kernel
{
    public function __construct(private RouterInterface $router)
    {

    }

    public function handle(Request $request): Response
    {
        [$routerHandler,$vars] = $this->router->dispatch($request);
        $response = call_user_func_array($routerHandler, $vars);

        return $response;
    }
}
