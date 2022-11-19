<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
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

Route::post('/user/create', [UserController::class,'register'])->name('register');
Route::post('/user/login', [UserController::class,'login'])->name('login');

Route::group(['prefix'=>'/place'],function () {
    Route::get('/get-categories', [PlaceController::class, 'listCategory']);
    Route::post('/list', [PlaceController::class, 'list']);
    Route::get('/{place}', [PlaceController::class, 'detail']);
});
Route::group(['prefix'=>'/tour'],function () {
    Route::get('/get-categories', [TourController::class, 'listCategory']);
    Route::post('/list', [TourController::class, 'list']);
    Route::get('/{tour}', [TourController::class, 'detail']);
});
