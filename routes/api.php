<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ColourController;

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
    Route::get('/', [CarController::class,'index']);
    Route::get('/{id}', [CarController::class,'show']);
    Route::post('/', [CarController::class,'store']);
    Route::put('/{id}', [CarController::class,'update']);
    Route::delete('/{id}', [CarController::class,'destroy']);
});

// Routes For Managing Colours
Route::group(['prefix'=> 'colours'], function () {
    Route::get('/',[ColourController::class,'index']);
    Route::get('/{id}',[ColourController::class,'show']);
    Route::post('/',[ColourController::class,'store']);
    Route::put('/{id}',[ColourController::class,'update']);
    Route::delete('/{id}',[ColourController::class,'destroy']);
});
