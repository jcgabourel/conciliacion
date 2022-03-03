<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancoController;

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
Route::post('/bancos/carga', [BancoController::class, 'carga'])->name('cargabancos');
Route::post('/bancos/store', [BancoController::class, 'store'])->name('guardaRegistroBancos');
