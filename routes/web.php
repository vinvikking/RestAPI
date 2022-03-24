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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', ['\App\Http\Controllers\HomeController', 'index'])->name('home');

Route::get('/schedule', ['\App\Http\Controllers\ScheduleController', 'index'])->name('schedule');
Route::get('/schedule/create/{customer}', ['\App\Http\Controllers\ScheduleController', 'create'])->name('schedule');
Route::post('/schedule/store', ['\App\Http\Controllers\ScheduleController', 'store'])->name('schedule');


Route::get('/cameras', ['\App\Http\Controllers\CamerasController', 'index'])->name('cameras');
Route::get('/servers', ['\App\Http\Controllers\ServersController', 'index'])->name('servers');
//Route::post('/cameras', '\App\Http\Controllers\CamerasController@jsonToObject');
//Route::resource('schedule', ScheduleController::class);