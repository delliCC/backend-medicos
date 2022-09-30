<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\StudiesController;
use App\Http\Controllers\API\TrainigController;
use App\Http\Controllers\API\WebinarController;
use App\Http\Controllers\API\VacantesController;
use App\Http\Controllers\API\PostulanteController;
use App\Http\Controllers\API\SucursalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ********************************* Vacantes *************************************
Route::group(['prefix' => 'sucursales'], function () {
    Route::get('/', [SucursalesController::class, 'index']);
});


Route::group(['prefix' => 'vacantes'], function () {
    Route::get('/{id}', [VacantesController::class, 'index']);
});

Route::group(['prefix' => 'postulante'], function () {
    Route::post('/{id}', [PostulanteController::class, 'guardar']);
    Route::get('/{id}', [PostulanteController::class, 'index']);
});

Route::group(['prefix' => 'estados'], function () {
    Route::get('/{id}', [VacantesController::class, 'index']);
});
// ********************************************************************************

Route::group(['prefix' => 'estudios'], function () {
    Route::get('/', [StudiesController::class, 'index']);
});

Route::group(['prefix' => 'webinar'], function () {
    Route::get('/', [WebinarController::class, 'index']);
});

Route::group(['prefix' => 'training'], function () {
    Route::get('/', [TrainigController::class, 'index']);
});

Route::group(['prefix' => 'training'], function () {
    Route::get('/', [TrainigController::class, 'index']);
});

Route::post('/login', [LoginController::class, 'login']);
Route::group(['middleware' => 'auth:api'], function() {
    // Route::group(['prefix' => 'estudios'], function () {
    //     Route::get('/', [StudiesController::class, 'index']);
    // });
});
