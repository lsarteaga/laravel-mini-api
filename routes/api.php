<?php

use App\Http\Controllers\CircleController;
use App\Http\Controllers\RectangleController;
use App\Http\Controllers\SquareController;
use App\Http\Controllers\TriangleController;
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
Route::get('square', [SquareController::class, 'index']);
Route::post('square', [SquareController::class, 'store']);
Route::put('square/{id}/update', [SquareController::class, 'update']);
Route::delete('square/{id}/delete', [SquareController::class, 'destroy']);

// triangle routes
Route::get('triangle', [TriangleController::class, 'index']);
Route::post('triangle', [TriangleController::class, 'store']);
Route::put('triangle/{id}/update', [TriangleController::class, 'update']);
Route::delete('triangle/{id}/delete', [TriangleController::class, 'destroy']);

// circle routes
Route::get('circle', [CircleController::class, 'index']);
Route::post('circle', [CircleController::class, 'store']);
Route::put('circle/{id}/update', [CircleController::class, 'update']);
Route::delete('circle/{id}/delete', [CircleController::class, 'destroy']);

// rectangle routes
Route::get('rectangle', [RectangleController::class, 'index']);
Route::post('rectangle', [RectangleController::class, 'store']);
Route::put('rectangle/{id}/update', [RectangleController::class, 'update']);
Route::delete('rectangle/{id}/delete', [RectangleController::class, 'destroy']);


