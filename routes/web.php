<?php

use App\Http\Controllers\ObraSocialController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class,'index']);

Route::resource('pacientes', PacienteController::class);
Route::resource('obras_sociales', ObraSocialController::class);
