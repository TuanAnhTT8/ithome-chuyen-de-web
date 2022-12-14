<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\StreetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('district/{id}',[DistrictController::class,'show']);
Route::get('ward/{id}',[WardController::class,'show']);
Route::get('street/{id}',[StreetController::class,'show']);
