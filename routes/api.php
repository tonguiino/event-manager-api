<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExternalApiController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('events', EventController::class);
Route::get('/external-reservations', [ExternalApiController::class, 'getReservations']); //Ruta para el consumo del api de cristian