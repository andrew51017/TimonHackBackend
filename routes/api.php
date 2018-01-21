<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => 'Api'], function () {
    Route::post('token', 'TokenController@authenticate');
    Route::post('register', 'TokenController@register');
});

// Authenticated API actions.

Route::group(['namespace' => 'Api', 'middleware' => ['jwt.auth']], function () {
    Route::get('carparks', 'CarparkController@getAll');
    Route::get('carparks/{carPark}', 'CarparkController@getSingle');
    Route::get('beacon', 'CarparkController@getByBeacon');
    Route::post('start/{carPark}', 'CarparkController@startSession');
});
