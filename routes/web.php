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
Route::get('/schedule/edit/{customer}', ['\App\Http\Controllers\ScheduleController', 'edit'])->name('schedule')->middleware('auth');
Route::get('/schedule/destroy/{customer}', ['\App\Http\Controllers\ScheduleController', 'destroy'])->name('schedule');

Route::post('/overlays/create/{schedule}', ['\App\Http\Controllers\OverlaysController', 'create'])->name('overlays');

Route::get('/cameras', ['\App\Http\Controllers\CamerasController', 'index'])->name('cameras');
Route::get('/customer', ['\App\Http\Controllers\CustomersController', 'index'])->name('customer');
Route::get('/servers', ['\App\Http\Controllers\ServersController', 'index'])->name('servers');
//Route::post('/cameras', '\App\Http\Controllers\CamerasController@jsonToObject');
//Route::resource('schedule', ScheduleController::class);