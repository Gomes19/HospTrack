<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EspecialidadeController;

Route::prefix('especialidade')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\EspecialidadeController::class, 'index'])->name('admin.especialidade.index');
    Route::post('/store', [App\Http\Controllers\Admin\EspecialidadeController::class, 'store'])->name('admin.especialidade.store');
    Route::post('/update/{especialidade:id}', [App\Http\Controllers\Admin\EspecialidadeController::class, 'update'])->name('admin.especialidade.update');
    Route::get('/delete/{especialidade:id}', [App\Http\Controllers\Admin\EspecialidadeController::class, 'delete'])->name('admin.especialidade.delete');
    Route::get('/list', [App\Http\Controllers\Admin\EspecialidadeController::class, 'list'])->name('admin.especialidade.list');
});
