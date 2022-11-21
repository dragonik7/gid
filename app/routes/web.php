<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
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
Route::get('place/{place}/edit', [PlaceController::class, 'edit'])->name('edit');
Route::patch('place/{place}', [PlaceController::class, 'update'])->name('update');
