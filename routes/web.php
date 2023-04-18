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

Route::get('/surf', [App\Http\Controllers\SurfController::class, 'index'])->name('surf.index');
Route::get('/kitesurf', [App\Http\Controllers\KitesurfController::class, 'index'])->name('kite.index');
Route::get('/wingfoil', [App\Http\Controllers\WingfoilController::class, 'index'])->name('wingfoil.index');

