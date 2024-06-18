<?php

use Illuminate\Support\Facades\Route;
Route::prefix('tipohospital')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\TipoHospitalController::class, 'index'])->name('admin.tipohospital.index');
    Route::post('/store', [App\Http\Controllers\Admin\TipoHospitalController::class, 'store'])->name('admin.tipohospital.store');
    Route::post('/update{id}', [App\Http\Controllers\Admin\TipoHospitalController::class, 'update'])->name('admin.tipohospital.update');
    Route::get('/delete{id}', [App\Http\Controllers\Admin\TipoHospitalController::class, 'delete'])->name('admin.tipohospital.delete');
    Route::get('/list', [App\Http\Controllers\Admin\TipoHospitalController::class, 'list'])->name('admin.tipohospital.list');
});
