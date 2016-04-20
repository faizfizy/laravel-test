<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', 'UserController', ['only' => [
        'index', 'show'
]]);
Route::resource('categories', 'CategoryController', ['only' => [
        'index', 'show'
]]);
Route::resource('products', 'ProductController', ['only' => [
        'index', 'show'
]]);
Route::resource('carts', 'CartController', ['only' => [
        'index', 'show'
]]);
Route::resource('likes', 'LikeController', ['only' => [
        'index', 'show'
]]);
Route::resource('notifications', 'NotificationController', ['only' => [
        'index', 'show'
]]);
Route::resource('messages', 'MessageController', ['only' => [
        'index', 'show'
]]);