<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MedicoController;

Route::prefix('medico')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\MedicoController::class, 'index'])->name('admin.medico.index');
    Route::post('/store', [App\Http\Controllers\Admin\MedicoController::class, 'store'])->name('admin.medico.store');
    Route::post('/update/{medico:id}', [App\Http\Controllers\Admin\MedicoController::class, 'update'])->name('admin.medico.update');
    Route::get('/delete/{medico:id}', [App\Http\Controllers\Admin\MedicoController::class, 'delete'])->name('admin.medico.delete');
    Route::get('/list', [App\Http\Controllers\Admin\MedicoController::class, 'list'])->name('admin.medico.list');
});

Route::prefix('gestao/medico')->middleware('auth')->middleware('hospital')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\MedicoController::class, 'index'])->name('gestao.medico.index');
    Route::post('/store', [App\Http\Controllers\Admin\MedicoController::class, 'store'])->name('gestao.medico.store');
    Route::post('/update/{medico:id}', [App\Http\Controllers\Admin\MedicoController::class, 'update'])->name('gestao.medico.update');
    Route::get('/delete/{medico:id}', [App\Http\Controllers\Admin\MedicoController::class, 'delete'])->name('gestao.medico.delete');
    Route::get('/list', [App\Http\Controllers\Admin\MedicoController::class, 'list'])->name('gestao.medico.list');
});
