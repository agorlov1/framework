<?php

namespace App\controllers;

use somecode\Framework\http\Response;

class PostController
{
    public function show(int $id): Response
    {
        $content = "<h1> !!Post -$id</h1>";

        return new Response($content);
    }
}
