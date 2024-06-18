<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
Route::middleware('auth')->post('perfil/update/{user:id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('perfil.user.update');

Route::prefix('users')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
    Route::post('/update/{user:id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::get('/delete/{user:id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
    Route::get('/perfil', [App\Http\Controllers\Admin\UserController::class, 'perfil'])->name('admin.user.perfil');
    
});


Route::prefix('gestao/funcionarios')->middleware('auth')->middleware('hospital')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('gestao.user.index');
    Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('gestao.user.store');
    Route::post('/update/{user:id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('gestao.user.update');
    Route::get('/delete/{user:id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('gestao.user.delete');
    Route::get('/perfil', [App\Http\Controllers\Admin\UserController::class, 'perfil'])->name('gestao.user.perfil');
});
