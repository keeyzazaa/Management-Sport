<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\formController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/daftar_alat_olahraga', [adminController::class, 'indexadmin'])->name('dashboard.indexadmin');

Route::resource('form', formController::class);
Route::post('/dashboard/{id}/approve', [formController::class, 'approve'])->name('dashboard.approve');
Route::delete('/dashboard/{id}/decline', [formController::class, 'decline'])->name('dashboard.decline');


Route::get('/daftar_pengguna', [formController::class, 'index'])->name('daftar_pengguna');

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard index
    Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');

    // CRUD Barang
    Route::get('/dashboard/create', [adminController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/store', [adminController::class, 'store'])->name('dashboard.store');
    Route::delete('/dashboard/{id}', [adminController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/dashboard/{id}/edit', [adminController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [adminController::class, 'update'])->name('dashboard.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
