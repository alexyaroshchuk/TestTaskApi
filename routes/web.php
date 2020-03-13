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

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('/register', 'RegisterController');
        Route::post('/login', 'LoginController');
        Route::post('/logout', 'LogoutController')->middleware('auth:api');
    });
    Route::middleware('auth:api')->group(function () {
        Route::get('/users/list', 'UserController@getUsers');
        Route::get('/users/message/inbox', 'UserController@getInboxMessages');
        Route::get('/users/message/{userId}', 'UserController@getMessageFromUser')->where('userId', '[0-9]+');
        Route::post('/message/write', 'MessageController@store');
    });

});
