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
    Route::group(['prefix' => 'especialidad'], function () {
        Route::get('/', [SpecialtyController::class, 'index'])->name('specialty.index');
        Route::get('/listar', [SpecialtyController::class, 'listar']);
        Route::post('/guardar', [SpecialtyController::class, 'store'])->name('specialty.store');
        Route::get('/{id}', [SpecialtyController::class, 'edit'])->name('specialty.edit');
        Route::put('/actualizar/{id}', [SpecialtyController::class, 'update'])->name('specialty.update');
        Route::get('/status/{id}/{status}', [SpecialtyController::class, 'changeStatus']);
    });

    Route::group(['prefix' => 'metodo'], function () {
        Route::get('/', [SpecialtyController::class, 'index'])->name('method.index');
        Route::get('/listar', [SpecialtyController::class, 'listar']);
        Route::post('/guardar', [SpecialtyController::class, 'store'])->name('method.store');
        Route::get('/{id}', [SpecialtyController::class, 'edit'])->name('method.edit');
        Route::put('/actualizar/{id}', [SpecialtyController::class, 'update'])->name('method.update');
        Route::get('/estatus/{id}/{estado}', [SpecialtyController::class, 'status'])->name('method.status');
    });
    
    Route::group(['prefix' => 'ficha-indica'], function () {
        Route::get('/', [TabIndicatesController::class, 'index'])->name('tabIndicates.index');
        Route::get('/listar', [TabIndicatesController::class, 'listar']);
        Route::post('/guardar', [TabIndicatesController::class, 'store'])->name('tabIndicates.store');
        Route::get('/{id}', [TabIndicatesController::class, 'edit'])->name('tabIndicates.edit');
        Route::put('/actualizar/{id}', [TabIndicatesController::class, 'update'])->name('tabIndicates.update');
        Route::get('/estatus/{id}/{estado}', [TabIndicatesController::class, 'status'])->name('tabIndicates.status');
    });
    
    Route::group(['prefix' => 'estudios'], function () {
        Route::get('/', [StudiesController::class, 'index'])->name('studies.index');
        Route::get('/listar', [StudiesController::class, 'listar']);
        Route::post('/guardar', [StudiesController::class, 'store'])->name('studies.store');
        Route::get('/{id}', [StudiesController::class, 'edit'])->name('studies.edit');
        Route::put('/actualizar/{id}', [StudiesController::class, 'update'])->name('studies.update');
        Route::get('/estatus/{id}/{estado}', [StudiesController::class, 'status'])->name('studies.status');
    });

    Route::group(['prefix' => 'cupones'], function () {
        Route::get('/', [CouponsController::class, 'index'])->name('coupons.index');
        Route::get('/listar', [CouponsController::class, 'listar']);
        Route::post('/guardar', [CouponsController::class, 'store'])->name('coupons.store');
        Route::get('/{id}', [CouponsController::class, 'edit'])->name('coupons.edit');
        Route::put('/actualizar/{id}', [CouponsController::class, 'update'])->name('coupons.update');
        Route::get('/estatus/{id}/{estado}', [CouponsController::class, 'status'])->name('coupons.status');
    });

    Route::group(['prefix' => 'medicos'], function () {
        Route::get('/', [MedicosController::class, 'index'])->name('medicos.index');
        Route::get('/listar', [MedicosController::class, 'listar']);
        Route::get('/crear', [MedicosController::class, 'create'])->name('medicos.create');
        Route::post('/guardar', [MedicosController::class, 'store'])->name('medicos.store');
        Route::get('/{id}', [MedicosController::class, 'edit'])->name('medicos.edit');
        Route::put('/actualizar/{id}', [MedicosController::class, 'update'])->name('medicos.update');
    });
});

