<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LuxuryController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\HybirdController;
use App\Http\Controllers\SuvController;
use App\Http\Controllers\ConvertiblesController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/luxury', [LuxuryController::class, 'index']);
Route::get('/sports', [SportsController::class, 'index']);
Route::get('/electric', [ElectricController::class, 'index']);
Route::get('/hybird', [HybirdController::class, 'index']);
Route::get('/suv', [SuvController::class, 'index']);
Route::get('/convertibles', [ConvertiblesController::class, 'index']);
Route::get('/order', function () {
    return view('order');
});
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars', [CarController::class, 'store']);
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.show');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});