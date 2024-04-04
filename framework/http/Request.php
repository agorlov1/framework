<?php


namespace somecode\Framework\http;

final class Request
{
    private array $getname;

    private array $postdata;

    private array $cookies;

    private array $server;

    public function getGetname(): array
    {
        return $this->getname;
    }

    public function getPostdata(): array
    {
        return $this->postdata;
    }

    public function getCookies(): array
    {
        return $this->cookies;
    }

    public function getServer(): array
    {
        return $this->server;
    }

    public function __construct(
        array $getname,
        array $postdata,
        array $cookies,
        array $server
    ) {
        $this->getname = $getname;
        $this->postdata = $postdata;
        $this->cookies = $cookies;
        $this->server = $server;
    }

    public static function createFromGlobals(): static
    {
        return new self($_GET,$_POST,$_COOKIE,$_SERVER);
    }
}
