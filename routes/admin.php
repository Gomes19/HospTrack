<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;

Route::middleware('auth')->middleware('hospital')->get('/dashboard', [HomeController::class, 'index'])->name('admin.index');

require __DIR__ . '/rotas/userRooter.php';
require __DIR__ . '/rotas/hospital.php';
require __DIR__ . '/rotas/tipoHospital.php';
require __DIR__ . '/rotas/servicoHospital.php';
require __DIR__ . '/rotas/areaHospital.php';
require __DIR__ . '/rotas/medicoRooter.php';
require __DIR__ . '/rotas/livroPontoRooter.php';
require __DIR__ . '/rotas/areaHospitalAreaRooter.php';
require __DIR__ . '/rotas/servicoHospitalServico.php';
require __DIR__ . '/rotas/especialidadeRooter.php';
require __DIR__ . '/relatorio/relatorioRooter.php';