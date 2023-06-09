<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{any}', function() {
    return view('welcome');
});
Route::get('/register', function() {
    return view('welcome');
});
Route::get('/login', function() {
    return view('welcome');
});
Route::get('/home', function() {
    return view('welcome');
});
Auth::routes();

include 'Profile/profile.php';
include 'Publication/publication.php';

