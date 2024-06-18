<?php

use Illuminate\Support\Facades\Route;
Route::prefix('hospital')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HospitalController::class, 'index'])->name('admin.hospital.index');
    Route::get('/create', [App\Http\Controllers\Admin\HospitalController::class, 'create'])->name('admin.hospital.create');
    Route::post('/store', [App\Http\Controllers\Admin\HospitalController::class, 'store'])->name('admin.hospital.store');
    Route::post('/update/{hospital:id}', [App\Http\Controllers\Admin\HospitalController::class, 'update'])->name('admin.hospital.update');
    Route::get('/delete/{hospital:id}', [App\Http\Controllers\Admin\HospitalController::class, 'delete'])->name('admin.hospital.delete');
    Route::get('/list', [App\Http\Controllers\Admin\HospitalController::class, 'list'])->name('admin.hospital.list');
    Route::get('/aprovar/{hospital:id}', [App\Http\Controllers\Admin\HospitalController::class, 'aprovar'])->name('admin.hospital.aprovar');
    Route::get('/reprovar/{hospital:id}', [App\Http\Controllers\Admin\HospitalController::class, 'reprovar'])->name('admin.hospital.reprovar');
});

Route::prefix('gestao/hospital')->middleware('auth')->middleware('hospital')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HospitalController::class, 'index'])->name('gestao.hospital.index');
    Route::post('/store', [App\Http\Controllers\Admin\HospitalController::class, 'store'])->name('gestao.hospital.store');
    Route::post('/update/{hospital:id}', [App\Http\Controllers\Admin\HospitalController::class, 'update'])->name('gestao.hospital.update');
    Route::get('/delete/{hospital:id}', [App\Http\Controllers\Admin\HospitalController::class, 'delete'])->name('gestao.hospital.delete');
    });
