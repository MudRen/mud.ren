<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function () {
    return response()->json(array_keys(cache("users")));
});

Route::get('user/{id}', function ($id) {
    return cache("user:$id")['dbase'];
});

Route::get('user/{id}/skills', function ($id) {
    return data_get(cache("user:$id"), 'skills');
});
