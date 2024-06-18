<?php

use Illuminate\Support\Facades\Route;
Route::prefix('relatorio')->middleware('auth')->group(function () {
    Route::get('/livro/ponto', [App\Http\Controllers\Relatorio\LivroPontoController::class, 'index'])->name('relatorio.livroPonto.index');
    Route::get('/hospital', [App\Http\Controllers\Relatorio\HospitalController::class, 'index'])->name('relatorio.hospital.index');
    Route::get('/medico', [App\Http\Controllers\Relatorio\MedicoController::class, 'index'])->name('relatorio.medico.index');
    Route::get('/area', [App\Http\Controllers\Relatorio\AreaController::class, 'index'])->name('relatorio.area.index');
});
Route::prefix('relatorio/pdf')->middleware('auth')->group(function () {
    Route::post('/livro/ponto', [App\Http\Controllers\Relatorio\LivroPontoController::class, 'pdf'])->name('relatorio.livroPonto.pdf');
    Route::post('/hospital', [App\Http\Controllers\Relatorio\HospitalController::class, 'pdf'])->name('relatorio.hospital.pdf');
    Route::post('/medico', [App\Http\Controllers\Relatorio\MedicoController::class, 'pdf'])->name('relatorio.medico.pdf');
    Route::post('/area', [App\Http\Controllers\Relatorio\AreaController::class, 'pdf'])->name('relatorio.area.pdf');
});
