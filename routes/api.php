<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FigureController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// route for get all records from database
Route::get('figures', [FigureController::class, 'index']);

// square routes
Route::get('square', [\App\Http\Controllers\SquareController::class, 'index']);
Route::post('square', [\App\Http\Controllers\SquareController::class, 'store']);
Route::get('square/{id}/show', [\App\Http\Controllers\SquareController::class,'show']);
Route::put('square/{id}/update', [\App\Http\Controllers\SquareController::class, 'update']);
Route::delete('square/{id}/delete', [\App\Http\Controllers\SquareController::class, 'destroy']);

// triangle routes
Route::get('triangle', [\App\Http\Controllers\TriangleController::class, 'index']);
// circle routes
Route::get('circle', [\App\Http\Controllers\CircleController::class, 'index']);
// rectangle routes
Route::get('rectangle', [\App\Http\Controllers\RectangleController::class, 'index']);


