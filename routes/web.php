<?php

use App\controllers\HomeController;
use App\controllers\PostController;
use somecode\Framework\Routing\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/posts/{id:\d+}', [PostController::class, 'show']),
];
