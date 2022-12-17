<?php

use App\Http\Controllers\Authentikasi;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Pasien;
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

// Auth
Route::get('/', [Authentikasi::class, 'index'])->name('login')->middleware('guest');
Route::get('/logout', [Authentikasi::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/', [Authentikasi::class, 'auth'])->name('auth.login')->middleware('guest');
Route::get('/register', [Authentikasi::class, 'create'])->name('register')->middleware('guest');
Route::post('/store', [Authentikasi::class, 'store'])->name('auth.store')->middleware('guest');

// Dashboard
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard')->middleware(['auth']);
Route::get('/pertanyaan', [Dashboard::class, 'index'])->name('dashboard')->middleware(['auth']);
Route::get('/pasien/{id}', [Pasien::class, 'detail'])->name('pasien.detail')->middleware(['auth']);
Route::post('/pasien/{id}', [Pasien::class, 'store'])->name('pasien.store')->middleware(['auth']);
Route::post('/pasien/status/{id}', [Pasien::class, 'save'])->name('pasien.status.save')->middleware(['auth']);

// Pertanyaan
Route::get('/pertanyaan', [Dashboard::class, 'pertanyaan'])->name('pertanyaan');
