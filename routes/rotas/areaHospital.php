<?php

use Illuminate\Support\Facades\Route;
Route::prefix('areahospital')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HospitalAreaController::class, 'index'])->name('admin.area.index');
    Route::post('/store', [App\Http\Controllers\Admin\HospitalAreaController::class, 'store'])->name('admin.area.store');
    Route::post('/update{hospitalArea:id}', [App\Http\Controllers\Admin\HospitalAreaController::class, 'update'])->name('admin.area.update');
    Route::get('/delete{hospitalArea:id}', [App\Http\Controllers\Admin\HospitalAreaController::class, 'delete'])->name('admin.area.delete');
    Route::get('/list', [App\Http\Controllers\Admin\HospitalAreaController::class, 'list'])->name('admin.area.list');
});

