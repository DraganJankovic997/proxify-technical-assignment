<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpdateProductController;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('product/{uuid}', [UpdateProductController::class, 'update'])->whereUuid('id');
});

Route::post('/auth/register', [AuthController::class, 'signUp']);
Route::post('/auth/login', [AuthController::class, 'login']);


