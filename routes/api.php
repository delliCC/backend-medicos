<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\StudiesController;
use App\Http\Controllers\API\WebinarController;

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
Route::group(['prefix' => 'estudios'], function () {
    Route::get('/', [StudiesController::class, 'index']);
});

Route::group(['prefix' => 'webinar'], function () {
    Route::get('/', [WebinarController::class, 'index']);
});

Route::post('/login', [LoginController::class, 'login']);
Route::group(['middleware' => 'auth:api'], function() {
    // Route::group(['prefix' => 'estudios'], function () {
    //     Route::get('/', [StudiesController::class, 'index']);
    // });
});