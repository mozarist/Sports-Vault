<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'welcome']);

Route::resource('/welcome', WelcomeController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/form/create', [FormController::class, 'create'])->name('form.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/product', ProductController::class);
    Route::resource('/form', FormController::class)->except(['create']);
});

require __DIR__ . '/auth.php';
