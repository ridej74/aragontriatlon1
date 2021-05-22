<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\NoticiaController;
use App\Models\Atleta;
use App\Models\Club;
use App\Models\Carrera;
use App\Models\Noticia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Página principal de la aplicación para invitados
Route::view('/', 'welcome')->name('invitado');

//Página principal de la aplicación para administradores
Route::view('admin', 'welcome_admin')->name('admin');

//Página principal del menú de administración
Route::view('administracion','home')->name('administracion');

Auth::routes(['verify'=>true]);

//Ruta del home de administración
Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

//Rutas de Noticias
Route::resource('Noticias', NoticiaController::class);
Route::get('noticias',[NoticiaController::class,'noticias'])->name('noticias');
Route::get('invitado_noticias',[NoticiaController::class,'index'])->name('invitado_noticias');
Route::get('noticias_vista/{id}', [NoticiaController::class,'invitadoshow'])->name('noticias_vista');

//Rutas de Atletas
Route::resource('Atletas', AtletaController::class);
Route::get('atletas_clubes',[AtletaController::class,'atletas_clubes'])->name('atletas_clubes');
Route::get('atletas_vista/{id}', [AtletaController::class,'invitadoshow'])->name('atletas_vista');

//Rutas de Clubes
Route::resource('Clubs', ClubController::class);
Route::get('clubes',[ClubController::class,'clubes'])->name('clubes');
Route::post('club.buscar',[ClubController::class,'buscar'])->name('clubes.buscar');
Route::post('invitado.club.buscar',[ClubController::class,'invitadobuscar'])->name('invitado.clubes.buscar');
Route::get('atletas_club/{id}', [ClubController::class,'mostraratletas'])->name('atletas_club');
Route::get('clubes_vista/{id}', [ClubController::class,'invitadoshow'])->name('clubes_vista');

//Rutas de Carreras
Route::resource('Carreras', CarreraController::class);
Route::get('carreras_clasificaciones',[CarreraController::class,'carreras_clasificaciones'])->name('carreras_clasificaciones');
Route::get('tiempos_clasificaciones/{id}', [CarreraController::class,'tiemposcarrera'])->name('tiempos_clasificaciones');
Route::get('mapa',[CarreraController::class,'mapa'])->name('mapa');
Route::get('carreras_vista/{id}', [CarreraController::class,'invitadoshow'])->name('carreras_vista');

//Buscadores
Route::get('invitado.carrera.mapa',[CarreraController::class,'mapa'])->name('carreras_mapa');
Route::post('atleta.buscar',[AtletaController::class,'buscar'])->name('atletas.buscar');
Route::post('invitado.atleta.buscar',[AtletaController::class,'invitadobuscar'])->name('invitado.atletas.buscar');
Route::post('carrera.buscar',[CarreraController::class,'buscar'])->name('carreras.buscar');
Route::post('invitado.carrera.buscar',[CarreraController::class,'invitadobuscar'])->name('invitado.carreras.buscar');
Route::post('noticia.buscar',[NoticiaController::class,'buscar'])->name('noticias.buscar');
Route::post('invitado.noticia.buscar',[NoticiaController::class,'invitadobuscar'])->name('invitado.noticias.buscar');


