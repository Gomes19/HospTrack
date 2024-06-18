<?php

use Illuminate\Support\Facades\Route;

Route::prefix('livroponto')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\LivroPontoController::class, 'index'])->name('admin.livroponto.index');
    Route::post('/store', [App\Http\Controllers\Admin\LivroPontoController::class, 'store'])->name('admin.livroponto.store');
    Route::post('/update{livroPonto:id}', [App\Http\Controllers\Admin\LivroPontoController::class, 'update'])->name('admin.livroponto.update');
    Route::get('/delete{livroPonto:id}', [App\Http\Controllers\Admin\LivroPontoController::class, 'delete'])->name('admin.livroponto.delete');
    Route::get('/list', [App\Http\Controllers\Admin\LivroPontoController::class, 'list'])->name('admin.livroponto.list');
});


Route::prefix('gestao/livroponto')->middleware('auth')->middleware('hospital')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\LivroPontoController::class, 'index'])->name('gestao.livroponto.index');
    Route::post('/store', [App\Http\Controllers\Admin\LivroPontoController::class, 'store'])->name('gestao.livroponto.store');
    Route::post('/update{livroPonto:id}', [App\Http\Controllers\Admin\LivroPontoController::class, 'update'])->name('gestao.livroponto.update');
    Route::get('/delete{livroPonto:id}', [App\Http\Controllers\Admin\LivroPontoController::class, 'delete'])->name('gestao.livroponto.delete');
    Route::get('/list', [App\Http\Controllers\Admin\LivroPontoController::class, 'list'])->name('gestao.livroponto.list');
});