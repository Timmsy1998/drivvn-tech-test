<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes For Managing Cars
Route::group(['prefix' => 'cars'], function () {
    Route::get('/', 'CarController@index');
    Route::get('/{id}', 'CarController@show');
    Route::post('/','CarController@store');
    Route::put('/{id}','CarController@update');
    Route::delete('/{id}','CarController@destroy');
});

// Routes For Managing Colours
Route::group(['prefix'=> 'colours'], function () {
    Route::get('/','ColourController@index');
    Route::get('/{id}','ColourController@show');
    Route::post('/','ColourController@store');
    Route::put('/{id}','ColourController@update');
    Route::delete('/{id}','ColourController@destroy');
});
