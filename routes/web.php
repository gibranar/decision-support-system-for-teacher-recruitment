<?php

use App\Http\Controllers\CagurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ResultController;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/cagur', [CagurController::class, 'index'])->name('cagur');
// Route::post('/cagur', [CagurController::class, 'store'])->name('storeCagur');
// Route::post('/cagur', [CagurController::class, 'store'])->name('storeCagur');
// Route::delete('/cagur/{id}', [CagurController::class, 'destroy'])->name('deleteCagur');
Route::resource('cagur', CagurController::class);

Route::get('/result', [ResultController::class, 'index'])->name('result');
