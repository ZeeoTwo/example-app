<?php

use App\Http\Controllers\ApiPublicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('/login', [AuthController::class, 'login']);

Route::get('/publications', [ApiPublicationController::class, 'index']);
Route::get('/publications/{publication}', [ApiPublicationController::class, 'view']);

Route::put('/publications/create', [ApiPublicationController::class, 'store']);
Route::delete('/publications/{id}', [ApiPublicationController::class, 'destroy']);
Route::post('/publications/{id}', [ApiPublicationController::class, 'update']);



Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [ApiAuthController::class, 'logout']);
    
});

//Public Routes
Route::get('/unauthorized', [ApiPublicationController::class, 'unauthorized']);