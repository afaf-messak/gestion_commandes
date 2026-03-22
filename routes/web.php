<?php

use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('commandes', CommandeController::class)->middleware('auth');
Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy')->middleware('auth');
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index')->middleware('auth');

Route::get('/', function () {
        return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
