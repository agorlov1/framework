<?php

namespace somecode\Framework\Routing;

class Route
{
    private string $uri;

    private array $handler;

    public static function get(string $uri, array|callable $handler): array
    {
        return ['GET', $uri, $handler];
    }

    public static function post(string $uri, array|callable $handler): array
    {

        return ['POST', $uri, $handler];
    }
}
