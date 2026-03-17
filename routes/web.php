<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
// Rutas protegidas para el CRUD de carros
Route::middleware(['auth'])->group(function () {
    Route::resource('cars', App\Http\Controllers\CarController::class);
});