<?php

use App\Http\Controllers\devicesController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\stationsController;
use App\Http\Controllers\UserController;
// use App\Models\Stations;  c
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
Route::get('/home', [devicesController::class, 'home']);
Route::get('/stations', [stationsController::class, 'index']);
Route::get('/web-monitoring', [devicesController::class, 'index']);
Route::get('/web-monitoring/{devices:station_id}', [devicesController::class, 'show']);
Route::get('/web-monitoring/cari', [devicesController::class, 'cari']);
Route::get('/dashboard', [UserController::class, 'index']);
Route::get('/nilai', [nilaiController::class, 'index']);
// Route::get('/dashboard/cari',[stationsController::class, 'search'])->name('search');

// Route::get('/dashboard/{id}/devices', [devicesController::class, 'show']);