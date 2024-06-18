<?php

use Illuminate\Support\Facades\Route;

Route::prefix('servicohospital')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HospitalServicoController::class, 'index'])->name('admin.servico.index');
    Route::post('/store', [App\Http\Controllers\Admin\HospitalServicoController::class, 'store'])->name('admin.servico.store');
    Route::post('/update/{hospitaisServicos:id}', [App\Http\Controllers\Admin\HospitalServicoController::class, 'update'])->name('admin.servico.update');
    Route::get('/delete/{hospitaisServicos:id}', [App\Http\Controllers\Admin\HospitalServicoController::class, 'delete'])->name('admin.servico.delete');
    Route::get('/list', [App\Http\Controllers\Admin\HospitalServicoController::class, 'list'])->name('admin.servico.list');
});