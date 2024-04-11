<?php

namespace somecode\Framework\Routing;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use somecode\Framework\http\exeptions\MethodNotAllowedException;
use somecode\Framework\http\exeptions\RouteNotFoundException;
use somecode\Framework\http\Request;

use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{
    public function dispatch(Request $request): array
    {
        [$handler, $vars] = $this->extractRouteInfo($request);
        if (is_array($handler)){

            [$controller, $method] = $handler;
            $handler=[new $controller, $method];
        }

        return [$handler, $vars];
    }

    private function extractRouteInfo(Request $request): array
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $routes = include BASE_PATH.'/routes/web.php';
            foreach ($routes as $route) {
                $collector->addRoute(...$route);
            }
        });

        $routInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPath(),
        );
        switch ($routInfo[0]) {
            case Dispatcher::FOUND:
                return [$routInfo[1], $routInfo[2]];
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowMethod = implode(',', $routInfo[1]);
                throw new MethodNotAllowedException(
                    "Supported HTTP methods: $allowMethod"
                );
            default:
                throw new RouteNotFoundException('Route not found');
        }
    }
}
