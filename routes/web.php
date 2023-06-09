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
/*Route reserver aux admin plustard*/
Route::resource('etapes', 'App\Http\Controllers\EtapeController');
Route::resource('levels', 'App\Http\Controllers\LevelController');

/*protection de la route resource pour le controller progression*/
Route::middleware(['auth'])->group(function () {
    Route::resource('progressions', 'App\Http\Controllers\ProgressionController');
});
//On modifie la route kitesurf en ajoutant le middleware auth et en changeant son URL pour pointer vers la nouvelle route indexKiteSurf.
//Route::get('/kitesurf', 'EtapeController@indexKiteSurf')->middleware('auth')->name('kitesurf');

/*protection des routes suivantes pour empecher l'utilisateur d'acceder au contenue lorsqu'il saisir directement l'url*/
Route::get('/kitesurf', [App\Http\Controllers\EtapeController::class, 'indexKiteSurf'])->name('etapes.indexKiteSurf')->middleware('auth');
Route::get('/wingfoil', [App\Http\Controllers\EtapeController::class, 'indexWingfoil'])->name('etapes.indexWingfoil')->middleware('auth');
Route::get('/surf', [App\Http\Controllers\EtapeController::class, 'indexSurf'])->name('etapes.indexSurf')->middleware('auth');

