<?php

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('cities', \App\Http\Controllers\Api\CitieController::class);
Route::apiResource('groups', \App\Http\Controllers\Api\GroupController::class);
Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
Route::apiResource('campaigns', \App\Http\Controllers\Api\CampaignController::class);


Route::apiResource('trash', \App\Http\Controllers\Api\TrashController::class);


