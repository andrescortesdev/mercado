<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagoController;

Route::get('/pago', [PagoController::class, 'crear'])->name('pagos.crear');
Route::get('/pago/success', [PagoController::class, 'success'])->name('pagos.success');
Route::get('/pago/failure', [PagoController::class, 'failure'])->name('pagos.failure');
Route::get('/pago/pending', [PagoController::class, 'pending'])->name('pagos.pending');

