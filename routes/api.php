<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\MovementController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\EgressMovementClassificationController;


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

// Route::post('login', [RegisterController::class, 'login']);

Route::post('/login', 'App\Http\Controllers\API\RegisterController@login');


Route::get('movement/{userId}', [MovementController::class, 'index']);
Route::get('movement/create/{userId}', [MovementController::class, 'create']);
Route::resource('movement', MovementController::class);

Route::get('customer/{clienteId}', [CustomerController::class, 'index']);
Route::get('egress-movement-classification', [EgressMovementClassificationController::class, 'index']);
// Route::apiResource('customer', CustomerController::class);




// Route::post('login', 'App\Http\Controllers\API/RegisterController', 'login']);
