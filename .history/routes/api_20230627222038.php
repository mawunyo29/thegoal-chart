<?php

use App\Http\Controllers\Api\DataBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::apiResource('users', 'App\Http\Controllers\Api\UserController');
 Route::post('relationship', [DataBaseController::class, 'getModel']);
    Route::get('relationship/{User}', [DataBaseController::class, 'getQuery']);
    Route::post('complex-data', [DataBaseController::class, 'complexQuery']);