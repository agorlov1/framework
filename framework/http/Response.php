<?php

namespace somecode\Framework\http;

class Response
{
    private mixed $content;

    private int $statusCode = 200;

    private array $headers = [];

    public function __construct(mixed $content, int $statusCode, array $headers)
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public function send()
    {
       echo $this->content;
    }
}
