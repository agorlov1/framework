<?php

namespace somecode\Framework\Routing;

use FastRoute\RouteCollector;
use somecode\Framework\http\Request;

use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{
    public function dispatch(Request $request): array
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

        [$status, [$controller, $method], $vars] = $routInfo;
        //        dd($controller);

        //                dd($controller);
        //        $response = (new $controller())->$method($vars);

        return [[new $controller, $method], $vars];
    }
}
