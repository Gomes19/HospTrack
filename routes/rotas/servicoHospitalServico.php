<?php

use Illuminate\Support\Facades\Route;

Route::prefix('gestao/servicohospital')->middleware('auth')->middleware('hospital')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\ServicoHospitalServicoController::class, 'index'])->name('gestao.servico.index');
    Route::post('/store', [App\Http\Controllers\Admin\ServicoHospitalServicoController::class, 'store'])->name('gestao.servico.store');
    Route::post('/update/{servico:id}/{hospital:id}', [App\Http\Controllers\Admin\ServicoHospitalServicoController::class, 'update'])->name('gestao.servico.update');
    Route::get('/delete/{servico:id}/{hospital:id}', [App\Http\Controllers\Admin\ServicoHospitalServicoController::class, 'delete'])->name('gestao.servico.delete');
    Route::get('/list', [App\Http\Controllers\Admin\ServicoHospitalServicoController::class, 'list'])->name('gestao.servico.list');
});