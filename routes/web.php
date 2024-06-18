<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Site\HomeController::class,'index'])->name('site.home');
Route::get('/sobre/nos', [App\Http\Controllers\Site\AboutUsController::class,'index'])->name('site.aboutUs');
Route::get('/contacto', [App\Http\Controllers\Site\ContactController::class,'index'])->name('site.contact');
Route::get('/hospitais/{hospitalArea:id?}', [App\Http\Controllers\Site\HospitalController::class,'index'])->name('site.hospital');
Route::get('/hospital/{hospital:id}', [App\Http\Controllers\Site\HospitalController::class,'show'])->name('site.hospital.show');
Route::get('/site/hospitais/areas', [App\Http\Controllers\Site\HospitalAreaController::class,'index'])->name('site.hospitalArea');





Auth::routes();

Route::middleware('auth')->middleware('hospital')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
