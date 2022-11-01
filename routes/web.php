<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\SiswaController;
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
Route::resource('siswa', SiswaController::class);

Route::get('ekskul/{ekskul}/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('ekskul/{ekskul}/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('ekskul/{ekskul}/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('ekskul/{ekskul}/anggota/edit/{siswa}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('ekskul/{ekskul}/anggota/update/{siswa}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('ekskul/{ekskul}/anggota/destroy/{siswa}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
