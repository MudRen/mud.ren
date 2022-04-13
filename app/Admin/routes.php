<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Encore\Admin\Facades\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('users', UserController::class);
    $router->resource('nodes', NodeController::class);
    $router->resource('threads', ThreadController::class);
    $router->resource('contents', ContentController::class);
    $router->resource('comments', CommentController::class);

    $router->resource('types', TypeController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('questions', QuestionController::class);
});
