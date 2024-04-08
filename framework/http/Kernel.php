<?php

namespace somecode\Framework\http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $routes = include BASE_PATH.'/routes/web.php';
            foreach ($routes as $route) {
                $collector->addRoute(...$route);
            }
//            $collector->addRoute('GET', '/', function (array $vars) {
//                $content = '<h1> Hello,World!!</h1>';
//
//                return new Response($content);
//            });
//            $collector->get('/post/{id}', function (array $vars) {
//                $content = "<h1> Post -{$vars['id']}</h1>";
//
//                return new Response($content);
//            });
        });


        $routInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPath(),
        );

        [$status, [$controller,$method], $vars] = $routInfo;
//        dd($controller);

//                dd($controller);
        $response = (new $controller())->$method($vars);

        return $response;
    }
}
