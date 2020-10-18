<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function () {
    return view('users');
});

Route::get('user/{id}', function ($id) {
    return cache("user:$id")['dbase'];
});

Route::get('user/{id}/skills', function ($id) {
    return cache("user:$id")['skills'];
});
