<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Liste des routes accessible qu'aux utilisateurs connecte
Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

//Imeplementation des routes permettant d'acceder aux methode de LevelController

Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
Route::get('/levels/create', [LevelController::class, 'create'])->name('levels.create');
Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
Route::get('/levels/{id}', [LevelController::class, 'show'])->name('levels.show');
Route::get('/levels/{id}/edit', [LevelController::class, 'edit'])->name('levels.edit');
Route::put('/levels/{id}', [LevelController::class, 'update'])->name('levels.update');
Route::delete('/levels/{id}', [LevelController::class, 'destroy'])->name('levels.destroy');

Route::group(['prefix' => 'etapes'], function () {
    Route::get('/', [EtapeController::class, 'index'])->name('etapes.index');
    Route::get('/create', [EtapeController::class, 'create'])->name('etapes.create');
    Route::post('/', [EtapeController::class, 'store'])->name('etapes.store');
    Route::get('/{id}/edit', [EtapeController::class, 'edit'])->name('etapes.edit');
    Route::put('/{id}', [EtapeController::class, 'update'])->name('etapes.update');
    Route::delete('/{id}', [EtapeController::class, 'destroy'])->name('etapes.destroy');
});

Route::group(['prefix' => 'kites'], function () {
    Route::get('/', [KiteController::class, 'index'])->name('kites.index');
    Route::get('/create', [KiteController::class, 'create'])->name('kites.create');
    Route::post('/', [KiteController::class, 'store'])->name('kites.store');
    Route::get('/{id}/edit', [KiteController::class, 'edit'])->name('kites.edit');
    Route::put('/{id}', [KiteController::class, 'update'])->name('kites.update');
    Route::delete('/{id}', [KiteController::class, 'destroy'])->name('kites.destroy');
});
