<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticationController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'render'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'render'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function() {
    Route::get('/',[ViewController::class,'dashboard'])->name('dashboard');
    Route::get('/dashboard',function() {
        return redirect()->route('dashboard');
    });
});
