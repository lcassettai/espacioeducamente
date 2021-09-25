<?php

use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ObraSocialController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\PrestacionController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

//Login routes
Route::get('login',[LoginController::class,'login'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'validateUser']);
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');


//Rutas autenticadas
Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    Route::resource('pacientes', PacienteController::class);
    Route::resource('obras_sociales', ObraSocialController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('generos', GeneroController::class);
    Route::resource('prestadores', PrestadorController::class);
    Route::resource('tratamientos', TratamientoController::class);

    Route::get('sesiones/{prestacion}/create', [SesionController::class, 'create'])->name('sesiones.create');
    Route::resource('sesiones', SesionController::class)->except(['create']);;

    Route::get('informes/{prestacion}/create', [InformeController::class, 'create'])->name('informes.create');
    Route::resource('informes', InformeController::class)->except(['create']);

    Route::get('prestaciones/{tratamiento}/list', [PrestacionController::class, 'list'])->name('prestaciones.list');
    Route::resource('prestaciones', PrestacionController::class)->except(['index']);


    Route::post('diagnosticos/store', [DiagnosticoController::class, 'store'])->name('diagnosticos.store');
});
