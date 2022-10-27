<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\StudiesController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SliderMainController;
use App\Http\Controllers\TypeMethodController;
use App\Http\Controllers\TypeSampleController;
use App\Http\Controllers\HistoryMedicosController;
use App\Http\Controllers\Reclutamiento\PuestosController;
use App\Http\Controllers\Reclutamiento\VacantesController;
use App\Http\Controllers\Reclutamiento\EmployeesController;
use App\Http\Controllers\Reclutamiento\PostulantController;
use App\Http\Controllers\Reclutamiento\SucursalesController;
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

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/listar', [RolesController::class, 'listar']);
        Route::post('/guardar', [RolesController::class, 'store'])->name('roles.store');
        Route::get('/{id}', [RolesController::class, 'edit'])->name('roles.edit');
        Route::put('/actualizar/{id}', [RolesController::class, 'update'])->name('roles.update');
        Route::get('/status/{id}/{status}', [RolesController::class, 'changeStatus'])->name('roles.status');

        Route::get('/asignacion/{id}', [RolesController::class, 'asignacion'])->name('roles.asignacion');
        Route::post('/asignacion/guardar', [RolesController::class, 'asignacionGuardar'])->name('asignacion.store');
    });

    Route::group(['prefix' => 'permisos'], function () {
        Route::get('/', [PermisosController::class, 'index'])->name('permissions.index');
        Route::get('/listar', [PermisosController::class, 'listar']);
        Route::post('/guardar', [PermisosController::class, 'store'])->name('permissions.store');
        Route::get('/{id}', [PermisosController::class, 'edit'])->name('permissions.edit');
        Route::put('/actualizar/{id}', [PermisosController::class, 'update'])->name('permissions.update');
        Route::get('/status/{id}/{status}', [PermisosController::class, 'changeStatus'])->name('permissions.status');
    });

    Route::group(['prefix' => 'usuario'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/listar', [UserController::class, 'listar']);
        Route::post('/guardar', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/actualizar/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/status/{id}/{status}', [UserController::class, 'changeStatus'])->name('user.status');
    });
    //catalogue

    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', [SliderMainController::class, 'index'])->name('slider.index');
        Route::get('/listar', [SliderMainController::class, 'listar']);
        Route::get('/crear', [SliderMainController::class, 'create'])->name('slider.create');
        Route::post('/guardar', [SliderMainController::class, 'store'])->name('slider.store');
        Route::get('/{id}', [SliderMainController::class, 'edit'])->name('slider.edit');
        Route::put('/actualizar/{id}', [SliderMainController::class, 'update'])->name('slider.update');
        Route::get('/status/{id}/{estado}', [SliderMainController::class, 'changeStatus'])->name('slider.status');
    });

    Route::group(['prefix' => 'especialidad'], function () {
        Route::get('/', [SpecialtyController::class, 'index'])->name('specialty.index');
        Route::get('/listar', [SpecialtyController::class, 'listar']);
        Route::post('/guardar', [SpecialtyController::class, 'store'])->name('specialty.store');
        Route::get('/{id}', [SpecialtyController::class, 'edit'])->name('specialty.edit');
        Route::put('/actualizar/{id}', [SpecialtyController::class, 'update'])->name('specialty.update');
        Route::get('/status/{id}/{status}', [SpecialtyController::class, 'changeStatus']);
    });

    Route::group(['prefix' => 'tipo-muestra'], function () {
        Route::get('/', [TypeSampleController::class, 'index'])->name('sample.index');
        Route::get('/listar', [TypeSampleController::class, 'listar']);
        Route::post('/guardar', [TypeSampleController::class, 'store'])->name('sample.store');
        Route::get('/{id}', [TypeSampleController::class, 'edit'])->name('sample.edit');
        Route::put('/actualizar/{id}', [TypeSampleController::class, 'update'])->name('sample.update');
        Route::get('/status/{id}/{status}', [TypeSampleController::class, 'changeStatus'])->name('sample.status');
    });

    Route::group(['prefix' => 'tipo-metodo'], function () {
        Route::get('/', [TypeMethodController::class, 'index'])->name('method.index');
        Route::get('/listar', [TypeMethodController::class, 'listar']);
        Route::post('/guardar', [TypeMethodController::class, 'store'])->name('method.store');
        Route::get('/{id}', [TypeMethodController::class, 'edit'])->name('method.edit');
        Route::put('/actualizar/{id}', [TypeMethodController::class, 'update'])->name('method.update');
        Route::get('/status/{id}/{status}', [TypeMethodController::class, 'changeStatus'])->name('method.status');
    });
    
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/listar', [BlogController::class, 'listar']);
        Route::get('/crear', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/guardar', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/actualizar/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::get('/estatus/{id}/{estado}', [BlogController::class, 'status'])->name('blog.status');
    });

    Route::group(['prefix' => 'cupones'], function () {
        Route::get('/', [CouponsController::class, 'index'])->name('coupons.index');
        Route::get('/listar', [CouponsController::class, 'listar']);
        Route::post('/guardar', [CouponsController::class, 'store'])->name('coupons.store');
        Route::get('/{id}', [CouponsController::class, 'edit'])->name('coupons.edit');
        Route::put('/actualizar/{id}', [CouponsController::class, 'update'])->name('coupons.update');
        Route::get('/estatus/{id}/{estado}', [CouponsController::class, 'status'])->name('coupons.status');
    });
    
    Route::group(['prefix' => 'webinar'], function () {
        Route::get('/', [WebinarController::class, 'index'])->name('webinar.index');
        Route::get('/listar', [WebinarController::class, 'listar']);
        Route::get('/crear', [WebinarController::class, 'create'])->name('webinar.create');
        Route::post('/guardar', [WebinarController::class, 'store'])->name('webinar.store');
        Route::get('/{id}', [WebinarController::class, 'edit'])->name('webinar.edit');
        Route::put('/actualizar/{id}', [WebinarController::class, 'update'])->name('webinar.update');
        Route::get('/status/{id}/{status}', [WebinarController::class, 'changeStatus'])->name('webinar.status');
    });

    Route::group(['prefix' => 'capacitacion'], function () {
        Route::get('/', [TrainingController::class, 'index'])->name('training.index');
        Route::get('/listar', [TrainingController::class, 'listar']);
        Route::get('/crear', [TrainingController::class, 'create'])->name('training.create');
        Route::post('/guardar', [TrainingController::class, 'store'])->name('training.store');
        Route::get('/{id}', [TrainingController::class, 'edit'])->name('training.edit');
        Route::put('/actualizar/{id}', [TrainingController::class, 'update'])->name('training.update');
        Route::get('/status/{id}/{status}', [TrainingController::class, 'changeStatus'])->name('training.status');
    });

    Route::group(['prefix' => 'medicos'], function () {
        Route::get('/', [MedicosController::class, 'index'])->name('medicos.index');
        Route::get('/listar', [MedicosController::class, 'listar']);
        Route::get('/crear', [MedicosController::class, 'create'])->name('medicos.create');
        Route::post('/guardar', [MedicosController::class, 'store'])->name('medicos.store');
        Route::get('/{id}', [MedicosController::class, 'edit'])->name('medicos.edit');
        // Route::get('/history-webinar/{id}', [MedicosController::class, 'historyWebinar'])->name('medicos.historyWebinar');
        Route::put('/actualizar/{id}', [MedicosController::class, 'update'])->name('medicos.update');
        Route::get('/status/{id}/{status}', [MedicosController::class, 'changeStatus'])->name('medicos.status');
    });

    Route::group(['prefix' => 'history-webinar'], function () {
        Route::get('/{id}', [HistoryMedicosController::class, 'index'])->name('history.index');
        Route::get('/listar/{id}', [HistoryMedicosController::class, 'listar'])->name('history.listar');
        Route::get('/constancia/{id}', [HistoryMedicosController::class, 'constancia'])->name('history.constancia');

        Route::get('/listar/training/{id}', [HistoryMedicosController::class, 'listarTraining'])->name('history.listar.training');
        Route::get('/constancia/training/{id}', [HistoryMedicosController::class, 'constanciaTraining'])->name('history.constancia.training');
    });


    Route::group(['prefix' => 'estudios'], function () {
        Route::get('/', [StudiesController::class, 'index'])->name('studies.index');
        Route::get('/listar', [StudiesController::class, 'listar']);
        Route::get('/crear', [StudiesController::class, 'create'])->name('studies.create');
        Route::post('/guardar', [StudiesController::class, 'store'])->name('studies.store');
        Route::get('/{id}', [StudiesController::class, 'edit'])->name('studies.edit');
        Route::put('/actualizar/{id}', [StudiesController::class, 'update'])->name('studies.update');
        Route::get('/status/{id}/{status}', [StudiesController::class, 'changeStatus'])->name('studies.status');
    });

    Route::group(['prefix' => 'sucursales'], function () {
        Route::get('/', [SucursalesController::class, 'index'])->name('sucursales.index');
        Route::get('/listar', [SucursalesController::class, 'listar']);
        Route::get('/crear', [SucursalesController::class, 'create'])->name('sucursales.create');
        Route::post('/guardar', [SucursalesController::class, 'store'])->name('sucursales.store');
        Route::get('/{id}', [SucursalesController::class, 'edit'])->name('sucursales.edit');
        Route::put('/actualizar/{id}', [SucursalesController::class, 'update'])->name('sucursales.update');
        Route::get('/status/{id}/{status}', [SucursalesController::class, 'changeStatus'])->name('sucursales.status');
    });

    Route::group(['prefix' => 'puestos'], function () {
        Route::get('/', [PuestosController::class, 'index'])->name('puestos.index');
        Route::get('/listar', [PuestosController::class, 'listar']);
        Route::post('/guardar', [PuestosController::class, 'store'])->name('puestos.store');
        Route::get('/{id}', [PuestosController::class, 'edit'])->name('puestos.edit');
        Route::put('/actualizar/{id}', [PuestosController::class, 'update'])->name('puestos.update');
        Route::get('/status/{id}/{status}', [PuestosController::class, 'changeStatus'])->name('puestos.status');
    });

    Route::group(['prefix' => 'empleados'], function () {
        Route::get('/', [EmployeesController::class, 'index'])->name('employees.index');
        Route::get('/listar', [EmployeesController::class, 'listar']);
        Route::get('/crear', [EmployeesController::class, 'create'])->name('employees.create');
        Route::post('/guardar', [EmployeesController::class, 'store'])->name('employees.store');
        Route::get('/{id}', [EmployeesController::class, 'edit'])->name('employees.edit');
        Route::put('/actualizar/{id}', [EmployeesController::class, 'update'])->name('employees.update');
        Route::get('/status/{id}/{status}', [EmployeesController::class, 'changeStatus'])->name('employees.status');
    });

    Route::group(['prefix' => 'vacantes'], function () {
        Route::get('/', [VacantesController::class, 'index'])->name('vacant.index');
        Route::get('/listar', [VacantesController::class, 'listar']);
        Route::get('/crear', [VacantesController::class, 'create'])->name('vacant.create');
        Route::post('/guardar', [VacantesController::class, 'store'])->name('vacant.store');
        Route::get('/{id}', [VacantesController::class, 'edit'])->name('vacant.edit');
        Route::put('/actualizar/{id}', [VacantesController::class, 'update'])->name('vacant.update');
        Route::get('/status/{id}/{status}', [VacantesController::class, 'changeStatus'])->name('vacant.status');
    });

    Route::group(['prefix' => 'postulantes'], function () {
        Route::get('/', [PostulantController::class, 'index'])->name('postulant.index');
        Route::get('/listar', [PostulantController::class, 'listar']);
        Route::get('/{id}', [PostulantController::class, 'edit'])->name('postulant.edit');
        Route::get('/solicitud/{id}', [PostulantController::class, 'solicitud'])->name('postulant.solicitud');
        Route::put('/actualizar/{id}', [PostulantController::class, 'update'])->name('postulant.update');
        Route::get('/estado/{id}/{estado}', [PostulantController::class, 'changeEstado'])->name('postulant.estado');
        Route::get('/eliminar/{id}', [PostulantController::class, 'destroy'])->name('postulant.destroy');
    });
});