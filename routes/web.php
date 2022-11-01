<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\PeranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('peran', PeranController::class);
Route::resource('ekskul', EkskulController::class);
Route::resource('anggota', AnggotaController::class);
