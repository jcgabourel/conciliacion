<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\cargaBancosController;
use App\Http\Controllers\detalleCargaBancosController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bancos', [BancoController::class, 'index'])->name('bancos.index');
//Route::post('/bancos/carga', [BancoController::class, 'carga'])->name('cargabancos');
Route::post('/bancos/store', [BancoController::class, 'store'])->name('guardaRegistroBancos');

Route::get('/cargaBancos', [cargaBancosController::class, 'index'])->name('cargaBancos');
Route::delete('/cargaBancos/Eliminar/{id}', [cargaBancosController::class, 'delete'])->name('eliminaCargaBancos');
Route::post('/cargaBancos/carga', [cargaBancosController::class, 'carga'])->name('cargabancos');

Route::get('/detalleCargaBancos/{id}',[detalleCargaBancosController::class, 'index'])->name("detalleBancos");;



Route::view('/sample', 'dashboard.homepage');


