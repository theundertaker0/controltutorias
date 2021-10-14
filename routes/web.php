<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\HomeController;

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


Auth::routes();
Route::get('/',[HomeController::class, 'index'] );
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutas de carreras
Route::resource("carreras", CarreraController::class)->except(['show']);
Route::get('getcarreras', [CarreraController::class,'getCarreras']);

//Rutas de semestres
Route::resource("semestres", SemestreController::class)->except(['show']);
Route::get('getsemestres', [SemestreController::class,'getSemestres']);

