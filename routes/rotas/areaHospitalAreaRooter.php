<?php

use Illuminate\Support\Facades\Route;

Route::prefix('gestao/areahospital')->middleware('auth')->middleware('hospital')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HospitalAreaHospitalController::class, 'index'])->name('gestao.area.index');
    Route::post('/store', [App\Http\Controllers\Admin\HospitalAreaHospitalController::class, 'store'])->name('gestao.area.store');
    Route::post('/update{hospitalArea:id}/{hospital:id}', [App\Http\Controllers\Admin\HospitalAreaHospitalController::class, 'update'])->name('gestao.area.update');
    Route::get('/delete{hospitalArea:id}/{{hospital:id}}', [App\Http\Controllers\Admin\HospitalAreaHospitalController::class, 'delete'])->name('gestao.area.delete');
    Route::get('/list', [App\Http\Controllers\Admin\HospitalAreaHospitalController::class, 'list'])->name('gestao.area.list');
});
