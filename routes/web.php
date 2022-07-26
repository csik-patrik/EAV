<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\EntityTypeController;
use App\Http\Controllers\ValueController;
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

Route::resource('/entity-type', EntityTypeController::class);

Route::resource('/attribute', AttributeController::class);

Route::resource('/entity', EntityController::class);

Route::resource('/value', ValueController::class);
