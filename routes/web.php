<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReporteController;
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

// // Auth::routes();
// Auth::routes();

// Route::get('/', [StaterkitController::class, 'home'])->name('home');
// Route::get('home', [StaterkitController::class, 'home'])->name('home');
// // Route Components
// Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
// Route::get('layouts/boxed', [StaterkitController::class, 'layout_boxed'])->name('layout-boxed');
// Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
// Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
// Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');

// // locale Route
// Route::get('lang/{locale}', [LanguageController::class, 'swap']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(["register" => false]);

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::group(['middlaware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/reporte', [ReporteController::class, 'index'])->name('reporte-medico');
});

