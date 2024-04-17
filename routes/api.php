<?php

use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\TypeController;
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

Route::apiResource('characters', CharacterController::class)->only('index', 'show');
Route::apiResource('items', ItemController::class)->only('index', 'show');
Route::apiResource('types', TypeController::class)->only('index', 'show');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
