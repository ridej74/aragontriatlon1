<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\NoticiaController;

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



Route::get('resizeImage', [ImageController::class, 'resizeImage']);
Route::post('resizeImagePost', [ImageController::class, 'resizeImagePost'])->name('resizeImagePost');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify'=>true]);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas de Noticias
Route::resource('Noticias', NoticiaController::class);

//Rutas de Atletas
Route::resource('Atletas', AtletaController::class);

//Rutas de Atletas
Route::resource('Clubs', ClubController::class);

//Rutas de Atletas
Route::resource('Carreras', CarreraController::class);