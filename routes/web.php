<?php

use somecode\Framework\Routing\Route;
use App\controllers\HomeController;
return [
    Route::get('/',[HomeController::class,'index'])
];
