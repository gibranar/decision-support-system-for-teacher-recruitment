<?php

use App\Http\Controllers\CagurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ResultController;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('cagur', CagurController::class);

// Route::controller(CagurController::class)->group(function () {
//     Route::prefix('cagur')->group(function () {
//         Route::get('/', [CagurController::class, 'index'])->name('cagur.index');
//         Route::get('/{cagur}', [CagurController::class, 'show'])->name('cagur.show');
//         Route::post('/', [CagurController::class, 'store'])->name('cagur.store');
//         Route::put('/{cagur}', [CagurController::class, 'update'])->name('cagur.show');
//         Route::delete('/{cagur}', [CagurController::class, 'destroy'])->name('deleteCagur');
//     });
// });

Route::get('/result', [ResultController::class, 'index'])->name('result');
Route::post('/result', [ResultController::class, 'store'])->name('storeResult');
Route::post('/result/rank', [ResultController::class, 'storeRank'])->name('storeRank');

// Get CSRF Token
Route::get('/csrf-token', function () {
    return csrf_token();
});