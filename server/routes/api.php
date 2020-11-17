<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\LitigationController;
use App\Http\Controllers\SodaController;
use App\Http\Controllers\TypeController;
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

Route::apiResource('soda', SodaController::class);

Route::delete('soda/delete', "SodaController@destroy");

Route::apiResource('type', TypeController::class);

Route::apiResource('brand', BrandController::class);

Route::apiResource('litigation', LitigationController::class);
