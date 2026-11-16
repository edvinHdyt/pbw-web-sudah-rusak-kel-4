<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Modul Customer: Tracking & Landing page (tanpa login)
Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/lacak-service/{id}', [CustomerController::class, 'update'])->name('customer.update');

Route::get('/dashboard', function () {
    return redirect()->intended('/admin');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
