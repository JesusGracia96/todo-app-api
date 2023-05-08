<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ActivitiesController;

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
    Route::resource('people', [PeopleController::class]);
    Route::resource('activities', [ActivitiesController::class]);
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    Route::get('people', [PeopleController::class, 'index']);
    Route::post('people', [PeopleController::class, 'store']);
    Route::get('people/{id}', [PeopleController::class, 'show']);
    Route::put('people/{id}', [PeopleController::class, 'update']);
    Route::delete('people/{id}', [PeopleController::class, 'destroy']);

    Route::get('activities', [ActivitiesController::class, 'index']);
    Route::post('activities', [ActivitiesController::class, 'store']);
    Route::get('activities/{id}', [ActivitiesController::class, 'show']);
    Route::put('activities/{id}', [ActivitiesController::class, 'update']);
    Route::delete('activities/{id}', [ActivitiesController::class, 'destroy']);
            
});
