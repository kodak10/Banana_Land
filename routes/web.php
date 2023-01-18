<?php

use App\Http\Controllers\ChariotController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\TransfertController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::resource('/utilisateur', UtilisateurController::class);

Route::resource('/plat', PlatController::class);

Route::resource('/transfert', TransfertController::class);

Route::resource('/chariot', ChariotController::class);

Route::resource('/vente', VenteController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


