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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/luxury', [LuxuryController::class, 'index']);
Route::get('/sports', [SportsController::class, 'index']);
Route::get('/electric', [ElectricController::class, 'index']);
Route::get('/hybird', [HybirdController::class, 'index']);
Route::get('/suv', [SuvController::class, 'index']);
Route::get('/convertibles', [ConvertiblesController::class, 'index']);
Route::get('/order', function () {
    return view('order');
});
Route::get('/cars/create', [CarController::class, 'create'])->middleware('auth', 'admin');
Route::post('/cars', [CarController::class, 'store'])->middleware('auth', 'admin');
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.show');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit')->middleware('auth', 'admin');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update')->middleware('auth', 'admin');
Route::delete('/cars/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy')->middleware('auth', 'admin');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']); 

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth', 'admin');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'storeProfile'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
});