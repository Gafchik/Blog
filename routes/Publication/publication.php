<?php

use App\Http\Controllers\Publication\PublicationController;
use Illuminate\Support\Facades\Route;

Route::group([
        'middleware' => ['auth:sanctum'],
        'prefix' => 'publication',
    ],
    function (){
        Route::post('/send',  [PublicationController::class, 'send']);
        Route::post('/get-my',  [PublicationController::class, 'getMy']);
        Route::post('/delete',  [PublicationController::class, 'delete']);
        Route::post('/edit',  [PublicationController::class, 'edit']);
    }
);
Route::group([
    'prefix' => 'publication',
],
    function (){
        Route::post('/get-all',  [PublicationController::class, 'getAll']);
    }
);
