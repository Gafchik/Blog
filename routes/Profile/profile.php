<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']],
    function (){
        Route::get('/profile', function() {
            return view('welcome');
        });
    }
);
