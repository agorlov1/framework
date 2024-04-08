<?php

namespace somecode\Framework\http;

class Request
{
    private array $getname;

    private array $postdata;

    private array $cookies;

    private array $files;

    private array $server;

    public function getFiles(): array
    {
        return $this->files;
    }

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
        array $files,
        array $server
    ) {
        $this->getname = $getname;
        $this->postdata = $postdata;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public function getPath(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}
