<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin|staff'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('karyawan', \App\Http\Controllers\Admin\KaryawanController::class);
    Route::get('/activity-logs', [\App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('activity-logs.index');
    
    // Export Routes
    Route::get('/exports/users/{format}', [\App\Http\Controllers\Admin\ExportController::class, 'exportUsers'])->name('exports.users');
    Route::get('/exports/karyawan/{format}', [\App\Http\Controllers\Admin\ExportController::class, 'exportKaryawan'])->name('exports.karyawan');
    Route::get('/exports/activity-logs/{format}', [\App\Http\Controllers\Admin\ExportController::class, 'exportActivityLogs'])->name('exports.activity-logs');
});

require __DIR__.'/auth.php';
