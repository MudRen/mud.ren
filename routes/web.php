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

Route::view('/', 'welcome');

Route::view('users', 'users');
Route::view('threads', 'threads');
Route::get('threads/{id}', Content::class);
Route::get('ff', function () {
    $urls = [
        "https://liangyuandian.club",
        "https://easyfastcloud.com",
        "https://www.cutecloud.net",
        "https://www.ure.best",
        "https://ovofast.com",
    ];
    // 随机返回一个网址
    $url = $urls[array_rand($urls)];

    return redirect()->away($url);
});
