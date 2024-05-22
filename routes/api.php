<?php

use App\Http\Controllers\CharacterClassController;
use App\Http\Controllers\RaceController;
use App\Models\CharacterClass;
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

Route::controller(RaceController::class)->group(function() {
    Route::prefix('/race')->group(function() {
        Route::post('/create', 'store');
        Route::get('/list', 'index');
        Route::get('/list/details/{id}', 'show');
        Route::patch('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });
});

Route::controller(CharacterClassController::class)->group(function() {
    Route::prefix('/class')->group(function() {
        Route::post('/create', 'store');
        Route::get('/list', 'index');
        Route::get('/list/details/{id}', 'show');
        Route::patch('/update/{id}', 'update');
    });
});