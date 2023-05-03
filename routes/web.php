<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LevelController;
use App\Http\Controllers\EtapeController;
use App\Http\Controllers\ProgressionController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Liste des routes accessible qu'aux utilisateurs connecte
Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

//Implementation des routes permettant d'acceder aux methode de LevelController

/*Toute les routes seront creer a l'aide de le méthode ressource
qui crée automatiquement plusieurs routes pour les opérations CRUD*/
Route::resource('etapes', 'App\Http\Controllers\EtapeController');
Route::resource('levels', 'App\Http\Controllers\LevelController');
Route::resource('progressions', 'App\Http\Controllers\ProgressionController');
