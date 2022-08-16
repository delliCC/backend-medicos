<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\StudiesController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TabIndicatesController;
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
    //catalogue
    Route::group(['prefix' => 'especialidad'], function () {
        Route::get('/', [SpecialtyController::class, 'index'])->name('specialty.index');
        Route::get('/listar', [SpecialtyController::class, 'listar']);
        Route::post('/guardar', [SpecialtyController::class, 'store'])->name('specialty.store');
        Route::get('/{id}', [SpecialtyController::class, 'edit'])->name('specialty.edit');
        Route::put('/actualizar/{id}', [SpecialtyController::class, 'update'])->name('specialty.update');
        Route::get('/estatus/{id}/{estado}', [SpecialtyController::class, 'status'])->name('specialty.status');
    });
    

    Route::get('/estudios', [StudiesController::class, 'index'])->name('studies');

    Route::get('/ficha-indica', [TabIndicatesController::class, 'index'])->name('tab-indicates');
    Route::post('/guardar-ficha-indica', [TabIndicatesController::class, 'store'])->name('save-tab-indicates');
    Route::get('/cupones', [CouponsController::class, 'index'])->name('coupons');

    Route::group(['prefix' => 'medicos'], function () {
        Route::get('/', [MedicosController::class, 'index'])->name('medicos.index');
        Route::get('/listar', [MedicosController::class, 'listar']);
        Route::get('/crear', [MedicosController::class, 'create'])->name('medicos.create');
        Route::post('/guardar', [MedicosController::class, 'store'])->name('medicos.store');
        Route::get('/{id}', [MedicosController::class, 'edit'])->name('medicos.edit');
        Route::put('/actualizar/{id}', [MedicosController::class, 'update'])->name('medicos.update');
    });
});

